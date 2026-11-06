<x-layout>
    <main class="min-h-[65vh] overflow-hidden bg-[#f7f5ef] text-[#232822]">
        <section class="mx-auto max-w-7xl px-6 py-14 sm:px-10 lg:px-12 lg:py-16">
            <div class="max-w-3xl">
                <p class="inline-flex items-center gap-2 rounded-full border border-[#deddd4] bg-white/70 px-4 py-2 text-xs font-semibold tracking-[0.18em] text-[#62685f] uppercase">
                    <span class="size-2 rounded-full bg-[#bd7456]"></span>
                    Order details
                </p>

                <h1 class="mt-6 font-serif text-5xl leading-[1.08] tracking-tight sm:text-6xl">
                    Order <span class="text-[#bd7456]">#{{ $order->order_number }}.</span>
                </h1>

                <div class="mt-6 flex flex-wrap items-center gap-x-6 gap-y-3 text-sm text-[#62685f]">
                    <p>Placed {{ $order->created_at->format('F j, Y \a\t g:i a') }}</p>
                    <p class="inline-flex items-center gap-2">
                        <span class="font-semibold text-[#232822]">Status</span>
                        @if ($order->status === 'processing')
                            <span class="rounded-full bg-[#e8eee5] px-3 py-1 text-xs font-semibold text-[#394b3b]">{{ ucfirst($order->status) }}</span>
                        @else
                            <span class="rounded-full bg-[#f1e8dc] px-3 py-1 text-xs font-semibold text-[#854d38]">{{ ucfirst($order->status) }}</span>
                        @endif
                    </p>
                </div>

                <a
                    href="{{ route('orders.index') }}"
                    class="mt-6 inline-flex items-center gap-2 text-sm font-semibold text-[#394b3b] underline decoration-[#deddd4] underline-offset-4 transition hover:text-[#bd7456]"
                >
                    <svg aria-hidden="true" class="size-4 rotate-180" viewBox="0 0 20 20" fill="none">
                        <path d="M4.167 10h11.666M10 4.167 15.833 10 10 15.833" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    Back to your orders
                </a>
            </div>
        </section>

        <section class="border-y border-[#deddd4] bg-[#efede5]">
            <div class="mx-auto grid max-w-7xl items-start gap-8 px-6 py-10 sm:px-10 lg:grid-cols-[1fr_20rem] lg:gap-12 lg:px-12 lg:py-14">
                <div>
                    <p class="text-xs font-semibold tracking-[0.2em] text-[#bd7456] uppercase">Your selection</p>
                    <h2 class="mt-2 font-serif text-3xl tracking-tight">Items in this order</h2>

                    <div class="mt-6 border-t border-[#deddd4]">
                        @foreach ($order->items as $item)
                            <article class="flex flex-col gap-3 border-b border-[#deddd4] py-5 sm:flex-row sm:items-center sm:justify-between">
                                <div class="min-w-0">
                                    <h3 class="font-serif text-xl">{{ $item->itemable->title }}</h3>
                                    <p class="mt-1 text-sm text-[#62685f]">
                                        Quantity {{ $item->quantity }} <span aria-hidden="true">·</span>
                                        ${{ number_format($item->price_at_purchase, 2) }} each
                                    </p>
                                </div>
                                <p class="font-semibold text-[#394b3b]">${{ number_format($item->price_at_purchase * $item->quantity, 2) }}</p>
                            </article>
                        @endforeach
                    </div>
                </div>

                <aside class="border border-[#deddd4] bg-[#f7f5ef] p-6 sm:p-8 lg:sticky lg:top-6">
                    <p class="text-xs font-semibold tracking-[0.2em] text-[#bd7456] uppercase">Order summary</p>
                    <h2 class="mt-3 font-serif text-3xl">A few final details.</h2>

                    @php
                        $tax = $order->grand_total * 0.05;
                    @endphp

                    <dl class="mt-7 border-t border-[#deddd4] text-sm">
                        <div class="flex items-center justify-between gap-4 border-b border-[#deddd4] py-4">
                            <dt class="text-[#62685f]">Items total</dt>
                            <dd class="font-medium">${{ number_format($order->grand_total, 2) }}</dd>
                        </div>
                        <div class="flex items-center justify-between gap-4 border-b border-[#deddd4] py-4">
                            <dt class="text-[#62685f]">Tax</dt>
                            <dd class="font-medium">${{ number_format($tax, 2) }}</dd>
                        </div>
                        <div class="flex items-center justify-between gap-4 py-5">
                            <dt class="font-semibold">Order total</dt>
                            <dd class="font-serif text-xl">${{ number_format($order->grand_total + $tax, 2) }}</dd>
                        </div>
                    </dl>

                    <p class="text-xs leading-5 text-[#62685f]">Thank you for supporting a collection of things worth keeping.</p>
                </aside>
            </div>
        </section>
    </main>
</x-layout>
