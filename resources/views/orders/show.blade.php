<x-layout>
    <h1>Order #{{ $order->order_number }}</h1>
    <p>Placed on: {{ $order->created_at->format('F j, Y \a\t g:i a') }}</p>
     <p><strong>Status:</strong> 
                    <span class="badge bg-amber-700 {{ $order->status == 'processing' ? 'success' : 'warning' }}">
                        {{ ucfirst($order->status) }}
                    </span>
                </p>
     <p><strong>Total:</strong> ${{ number_format($order->grand_total, 2) }}</p>

     <div class="row">
    <div class="col-12 mt-4">
        <div class="card">
            <div class="card-header">
                <h4>Order Items</h4>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($order->items as $item)
                        <tr>
                            <td>{{ $item->itemable->title }}</td>
                            <td>${{ number_format($item->price_at_purchase, 2) }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>${{ number_format($item->price_at_purchase * $item->quantity, 2) }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            @php
                                $tax = $order->grand_total * 0.05;
                            @endphp
                            <td colspan="3" class="text-end"><strong>Tax:</strong></td>
                            <td>${{ number_format($tax , 2) }}</td></tr>
                            <tr>
                            <td colspan="3" class="text-end"><strong>Order Grand Total:</strong></td>
                            <td>${{ number_format($order->grand_total + $tax , 2) }}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
</x-layout>