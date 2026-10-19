<?php

// app/Http/Controllers/CheckoutController.php
namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CheckoutController extends Controller {
    public function processCheckout(Request $request) {
        $userId = Auth::id();

        // 1. Fetch current items in the cart
        $cartItems = CartItem::where('user_id', $userId)->get();

        if ($cartItems->isEmpty()) {
            return redirect()->back()->with('error', 'Your cart is completely empty!');
        }

        // 2. Wrap everything in a database transaction to guarantee data integrity
        $order = DB::transaction(function () use ($userId, $cartItems) {
            
            // Calculate grand total cost
            $grandTotal = $cartItems->sum(function ($item) {
                return $item->price_at_addition * $item->quantity;
            });

            // 3. Create the parent Order record
            $order = Order::create([
                'user_id'      => $userId,
                'order_number' => 'ORD-' . strtoupper(Str::random(10)),
                'grand_total'  => $grandTotal,
                'status'       => 'processing'
            ]);

            // 4. Batch loop and insert items directly into the permanent database order_items table
            foreach ($cartItems as $cartItem) {
                OrderItem::create([
                    'order_id'          => $order->id,
                    'itemable_id'       => $cartItem->itemable_id,
                    'itemable_type'     => $cartItem->itemable_type,
                    'quantity'          => $cartItem->quantity,
                    'price_at_purchase' => $cartItem->price_at_addition, // Saves price historical point
                ]);
            }

            // 5. Instantly flush the temporary cart items from the database
            CartItem::where('user_id', $userId)->delete();

            return $order;
        });

        return redirect()->route('cart.index')->with('success', "Order {$order->order_number} successfully placed!");
    }
}
