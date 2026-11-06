<x-layout>
    <main class="min-h-[65vh] overflow-hidden bg-[#f7f5ef] text-[#232822]">
        <section class="mx-auto max-w-7xl px-6 py-14 sm:px-10 lg:px-12 lg:py-16">
            <div class="max-w-3xl">
                <p class="inline-flex items-center gap-2 rounded-full border border-[#deddd4] bg-white/70 px-4 py-2 text-xs font-semibold tracking-[0.18em] text-[#62685f] uppercase">
                    <span class="size-2 rounded-full bg-[#bd7456]"></span>
                    Your collection
                </p>

                <h1 class="mt-6 font-serif text-5xl leading-[1.08] tracking-tight sm:text-6xl">
                    Your orders<span class="text-[#bd7456]">.</span>
                </h1>

                <p class="mt-6 max-w-2xl text-lg leading-8 text-[#62685f]">
                    A record of the things you’ve brought home.
                </p>
            </div>
        </section>

        <section class="border-y border-[#deddd4] bg-[#efede5]">
            <div class="mx-auto max-w-7xl px-6 py-10 sm:px-10 lg:px-12 lg:py-14">
                @if ($orders->isEmpty())
                    <div class="border border-[#deddd4] bg-[#f7f5ef] px-6 py-12 text-center sm:px-10">
                        <span aria-hidden="true" class="mx-auto grid size-14 place-items-center rounded-full bg-[#f1e8dc] text-[#bd7456]">
                            <svg class="size-6" viewBox="0 0 24 24" fill="none">
                                <path d="M5 8h14l1 12H4L5 8Z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round" />
                                <path d="M9 9V6a3 3 0 0 1 6 0v3" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                            </svg>
                        </span>
                        <h2 class="mt-5 font-serif text-3xl">Your story starts with a first order.</h2>
                        <p class="mx-auto mt-3 max-w-lg text-sm leading-6 text-[#62685f]">
                            Explore the collection and find something worth keeping.
                        </p>
                        <a
                            href="{{ route('music/index') }}"
                            class="mt-7 inline-flex items-center gap-3 rounded-full bg-[#394b3b] px-6 py-3.5 text-sm font-semibold text-white transition hover:bg-[#576b56]"
                        >
                            Explore the collection
                            <svg aria-hidden="true" class="size-4" viewBox="0 0 20 20" fill="none">
                                <path d="M4.167 10h11.666M10 4.167 15.833 10 10 15.833" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a>
                    </div>
                @else
                    <div class="mb-6">
                        <p class="text-xs font-semibold tracking-[0.2em] text-[#bd7456] uppercase">Order history</p>
                        <h2 class="mt-2 font-serif text-3xl tracking-tight">What you’ve collected</h2>
                    </div>

                    <div class="border-t border-[#deddd4]">
                        @foreach ($orders as $order)
                            <article class="flex flex-col gap-4 border-b border-[#deddd4] py-5 sm:flex-row sm:items-center sm:justify-between sm:py-6">
                                <div class="min-w-0">
                                    <p class="text-xs font-semibold tracking-[0.16em] text-[#bd7456] uppercase">
                                        Placed {{ $order->created_at->format('M j, Y') }}
                                    </p>
                                    <h3 class="mt-2 font-serif text-2xl">
                                        Order #{{ $order->order_number }}
                                    </h3>
                                    <p class="mt-2 text-sm text-[#62685f]">
                                        <span class="font-semibold text-[#232822]">Status</span>
                                        @if ($order->status === 'processing')
                                            <span class="ml-2 inline-flex rounded-full bg-[#e8eee5] px-3 py-1 text-xs font-semibold text-[#394b3b]">{{ ucfirst($order->status) }}</span>
                                        @else
                                            <span class="ml-2 inline-flex rounded-full bg-[#f1e8dc] px-3 py-1 text-xs font-semibold text-[#854d38]">{{ ucfirst($order->status) }}</span>
                                        @endif
                                    </p>
                                </div>

                                <div class="flex flex-wrap items-center justify-between gap-5 border-t border-[#deddd4] pt-4 sm:justify-end sm:border-0 sm:pt-0">
                                    <div class="sm:text-right">
                                        <p class="text-xs font-semibold tracking-[0.12em] text-[#62685f] uppercase">Order total</p>
                                        <p class="mt-1 font-serif text-xl">${{ number_format($order->grand_total, 2) }}</p>
                                    </div>
                                    <a
                                        href="{{ route('orders.show', $order) }}"
                                        class="inline-flex items-center gap-2 rounded-full bg-[#394b3b] px-5 py-3 text-sm font-semibold text-white transition hover:bg-[#576b56]"
                                    >
                                        View order
                                        <svg aria-hidden="true" class="size-4" viewBox="0 0 20 20" fill="none">
                                            <path d="M4.167 10h11.666M10 4.167 15.833 10 10 15.833" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </a>
                                </div>
                            </article>
                        @endforeach
                    </div>

                    @if ($orders->hasPages())
                        <div class="mt-8 border-t border-[#deddd4] pt-6">
                            {{ $orders->links() }}
                        </div>
                    @endif
                @endif
            </div>
        </section>
    </main>
</x-layout>
