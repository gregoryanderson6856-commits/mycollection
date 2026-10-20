<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller {
    
    // 1. Render out existing active cart collection item profiles
    public function index() {
        // Use eager loading ('itemable') to avoid N+1 query loops
        $cartItems = CartItem::with('itemable')
            ->where('user_id', Auth::id())
            ->get();

        return view('cart.index', compact('cartItems'));
    }

    // 2. Perform the secure configuration mapping validation and insertion
    public function addToCart(Request $request) {
        $validated = $request->validate([
            'item_id'   => 'required|integer',
            'item_type' => 'required|string|in:albums,paintings,comicbooks,tabletalks',
            'quantity'  => 'required|integer|min:1'
        ]);

        // Explicit lookup dictionary mapping values safely to code structures
        $modelMap = [
            'albums'     => \App\Models\Album::class,
            'paintings'  => \App\Models\Painting::class,
            'comicbooks' => \App\Models\Comicbook::class,
            'tabletalks' => \App\Models\Tabletalk::class,
        ];

        $targetModelClass = $modelMap[$validated['item_type']];
        
        // Confirm item exists right now in the DB
        $item = $targetModelClass::findOrFail($validated['item_id']);

        // Insert or update step
        CartItem::updateOrCreate(
            [
                'user_id'       => Auth::id(),
                'itemable_id'   => $item->id,
                'itemable_type' => $targetModelClass,
            ],
            [
                'price_at_addition' => $item->price,
                'quantity'          =>  $validated['quantity']
            ]
        );

        return redirect()->route('cart.index')->with('success', 'Product added to cart!');
    }
}