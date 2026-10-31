<x-layout>
    <h1>Your Orders</h1>
    <ul>
        @foreach ($orders as $order)
            <li>
                <a href="{{ route('orders.show', $order) }}">
                    Order #{{ $order->id }} - {{ $order->created_at->format('M d, Y') }}
                </a>
            </li>
        @endforeach
    </ul>

    {{ $orders->links() }}
</x-layout>