<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\CartItem;
use App\Models\Comicbook;
use App\Models\Painting;
use App\Models\Tabletalk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    // 1. Render out existing active cart collection item profiles
    public function index()
    {
        // Use eager loading ('itemable') to avoid N+1 query loops
        $cartItems = CartItem::with('itemable')
            ->where('user_id', Auth::id())
            ->get();

        return view('cart.index', compact('cartItems'));
    }

    // 2. Perform the secure configuration mapping validation and insertion
    public function addToCart(Request $request)
    {
        $validated = $request->validate([
            'item_id' => 'required|integer',
            'item_type' => 'required|string|in:albums,paintings,comicbooks,tabletalks',
            'quantity' => 'required|integer|min:1',
        ]);

        // Explicit lookup dictionary mapping values safely to code structures
        $modelMap = [
            'albums' => Album::class,
            'paintings' => Painting::class,
            'comicbooks' => Comicbook::class,
            'tabletalks' => Tabletalk::class,
        ];

        $targetModelClass = $modelMap[$validated['item_type']];

        // Confirm item exists right now in the DB
        $item = $targetModelClass::findOrFail($validated['item_id']);

        // Insert or update step
        CartItem::updateOrCreate(
            [
                'user_id' => Auth::id(),
                'itemable_id' => $item->id,
                'itemable_type' => $targetModelClass,
            ],
            [
                'price_at_addition' => $item->price,
                'quantity' => $validated['quantity'],
            ]
        );

        return redirect()->route('cart.index')->with('success', 'Product added to cart!');
    }

    public function remove(Request $request)
    {
        $id = $request->id;
        // Debug
        $cartItem = CartItem::find($id);
        if (! $cartItem) {
            return redirect()->back()->with('error', 'Item not found in cart!');
        }
        $cartItem->delete();

        return redirect()->back()->with('success', 'Product removed from cart!');
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $action = $request->action; // 'increase' or 'decrease'
        $cartItem = CartItem::find($id);
        if (! $cartItem) {
            return redirect()->back()->with('error', 'Cart item not found.');
        }
        if ($action === 'increase') {
            $cartItem->quantity += 1;
        } elseif ($action === 'decrease') {
            $cartItem->quantity -= 1;

            if ($cartItem->quantity <= 0) {
                $cartItem->delete();

                return redirect()->back()->with('success', 'Product removed from cart.');
            }
        }
        $cartItem->save();

        return redirect()->back()->with('success', 'Cart updated!');
    }
}
