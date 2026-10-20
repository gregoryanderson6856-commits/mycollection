<x-layout>

  <!-- resources/views/cart/index.blade.php -->
<div class="cart-wrapper">
    <h2>Shopping Cart Dashboard</h2>

    @if(session('success'))
        <div style="color: green; margin-bottom: 15px;">{{ session('success') }}</div>
    @endif

    @if($cartItems->isEmpty())
        <p>Your shopping cart is empty.</p>
    @else
        <table border="1" cellpadding="10" style="border-collapse: collapse; width: 100%;">
            <thead>
                <tr>
                
                    <th>Category Type</th>
                    <th>Product Title</th>
                    <th>Unit Price</th>
                    <th>Quantity Ordered</th>
                    <th>Line Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @php $cartTotal = 0; @endphp
                @foreach($cartItems as $item)
                    @php 
                        // The 'itemable' relation instantly becomes the Album, Painting, etc. model entry
                        $details = $item->itemable; 
                        $subtotal = $item->price_at_addition * $item->quantity;
                        $cartTotal += $subtotal;
                    @endphp
                    <tr>
                      
                        <td><strong>{{ $item->type_label }}</strong></td>
                        <td>{{ $details->title ?? 'Title details missing' }}</td>
                        <td>${{ number_format($item->price_at_addition, 2) }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>${{ number_format($subtotal, 2) }}</td>
                    
                    </tr>
                @endforeach
                <tr>
                    <td colspan="4" align="right"><strong>Grand Total:</strong></td>
                    <td><strong>${{ number_format($cartTotal, 2) }}</strong></td>
                </tr>
            </tbody>
        </table>
    @endif
    <!-- Add underneath the table inside resources/views/cart/index.blade.php -->
@if(!$cartItems->isEmpty())
    <div style="margin-top: 20px; text-align: right;">
        <form action="{{ route('checkout.process') }}" method="POST">
            @csrf
            <button type="submit" style="background: #28a745; color: white; padding: 12px 24px; border: none; font-size: 16px; cursor: pointer; border-radius: 4px;">
                Proceed and Place Order Now
            </button>
        </form>
    </div>
@endif
</div>

</x-layout>