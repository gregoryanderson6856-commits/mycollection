<x-layout>
    <main class="overflow-hidden bg-[#f7f5ef] text-[#232822]">
        <section class="mx-auto max-w-7xl px-6 py-14 sm:px-10 lg:px-12 lg:py-16">
            <div class="max-w-3xl">
                <p class="inline-flex items-center gap-2 rounded-full border border-[#deddd4] bg-white/70 px-4 py-2 text-xs font-semibold tracking-[0.18em] text-[#62685f] uppercase">
                    <span class="size-2 rounded-full bg-[#bd7456]"></span>
                    Your selection
                </p>

                <h1 class="mt-6 font-serif text-5xl leading-[1.08] tracking-tight sm:text-6xl">
                    Your cart<span class="text-[#bd7456]">.</span>
                </h1>

                <p class="mt-6 max-w-2xl text-lg leading-8 text-[#62685f]">
                    Take one last look at the things you’ve collected before making them yours.
                </p>

                <a
                    href="{{ route('music/index') }}"
                    class="mt-5 inline-flex items-center gap-2 text-sm font-semibold text-[#394b3b] underline decoration-[#deddd4] underline-offset-4 transition hover:text-[#bd7456]"
                >
                    <svg aria-hidden="true" class="size-4 rotate-180" viewBox="0 0 20 20" fill="none">
                        <path d="M4.167 10h11.666M10 4.167 15.833 10 10 15.833" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    Continue shopping
                </a>

                @if (session('success'))
                    <p role="status" class="mt-6 rounded-2xl border border-[#cbd8c8] bg-[#e8eee5] px-5 py-4 text-sm font-medium text-[#394b3b]">
                        {{ session('success') }}
                    </p>
                @endif
            </div>
        </section>

        <section class="border-y border-[#deddd4] bg-[#efede5]">
            <div class="mx-auto max-w-7xl px-6 py-10 sm:px-10 lg:px-12 lg:py-14">
                @if ($cartItems->isEmpty())
                    <div class="rounded-[1.75rem] border border-[#deddd4] bg-[#f7f5ef] px-6 py-12 text-center sm:px-10">
                        <span aria-hidden="true" class="mx-auto grid size-14 place-items-center rounded-full bg-[#f1e8dc] text-[#bd7456]">
                            <svg class="size-6" viewBox="0 0 24 24" fill="none">
                                <path d="M3 4h2l2.2 10.1a2 2 0 0 0 2 1.6h8.9a2 2 0 0 0 2-1.6L22 8H6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <circle cx="10" cy="20" r="1" fill="currentColor" />
                                <circle cx="18" cy="20" r="1" fill="currentColor" />
                            </svg>
                        </span>
                        <h2 class="mt-5 font-serif text-3xl">Your cart is waiting for a favorite.</h2>
                        <p class="mx-auto mt-3 max-w-lg text-sm leading-6 text-[#62685f]">
                            Browse the collection and add something special to your shelf.
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
                    @php $cartTotal = 0; @endphp

                    <div class="grid items-start gap-6 lg:grid-cols-[1fr_20rem] lg:gap-8">
                        <div>
                            <div class="mb-5">
                                <p class="text-xs font-semibold tracking-[0.2em] text-[#bd7456] uppercase">Your selections</p>
                                <h2 class="mt-2 font-serif text-3xl tracking-tight">Collected so far</h2>
                            </div>

                            <div class="grid gap-4">
                                @foreach ($cartItems as $item)
                                    @php
                                        $details = $item->itemable;
                                        $subtotal = $item->price_at_addition * $item->quantity;
                                        $cartTotal += $subtotal;
                                    @endphp

                                    <article class="border-b border-[#deddd4] py-5 first:border-t sm:py-6">
                                        <div class="flex flex-col gap-5 sm:flex-row sm:items-center sm:justify-between">
                                            <div class="min-w-0">
                                                <p class="text-xs font-semibold tracking-[0.16em] text-[#bd7456] uppercase">{{ $item->type_label }}</p>
                                                <h3 class="mt-2 truncate font-serif text-xl">{{ $details->title ?? 'Title details missing' }}</h3>
                                                <p class="mt-2 text-sm text-[#62685f]">
                                                    Unit price: ${{ number_format($item->price_at_addition, 2) }}
                                                </p>
                                            </div>

                                            <div class="flex flex-wrap items-center justify-between gap-4 border-t border-[#deddd4] pt-4 sm:justify-end sm:border-0 sm:pt-0">
                                                <div class="flex items-center gap-3">
                                                    <form action="{{ route('cart.update') }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{ $item->id }}">
                                                        <input type="hidden" name="action" value="decrease">
                                                        <button
                                                            type="submit"
                                                            aria-label="Decrease quantity of {{ $details->title ?? 'item' }}"
                                                            class="grid size-9 place-items-center rounded-full border border-[#deddd4] text-lg font-medium text-[#394b3b] transition hover:border-[#576b56] hover:bg-[#f1e8dc]"
                                                        >
                                                            &minus;
                                                        </button>
                                                    </form>

                                                    <span class="min-w-6 text-center text-sm font-semibold text-[#232822]">{{ $item->quantity }}</span>

                                                    <form action="{{ route('cart.update') }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{ $item->id }}">
                                                        <input type="hidden" name="action" value="increase">
                                                        <button
                                                            type="submit"
                                                            aria-label="Increase quantity of {{ $details->title ?? 'item' }}"
                                                            class="grid size-9 place-items-center rounded-full border border-[#deddd4] text-lg font-medium text-[#394b3b] transition hover:border-[#576b56] hover:bg-[#f1e8dc]"
                                                        >
                                                            +
                                                        </button>
                                                    </form>
                                                </div>

                                                <div class="min-w-24 text-right">
                                                    <p class="text-xs font-semibold tracking-[0.12em] text-[#62685f] uppercase">Subtotal</p>
                                                    <p class="mt-1 font-semibold text-[#232822]">${{ number_format($subtotal, 2) }}</p>
                                                </div>

                                                <form action="{{ route('cart.remove') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $item->id }}">
                                                    <button
                                                        type="submit"
                                                        class="rounded-full px-3 py-2 text-sm font-semibold text-[#bd7456] transition hover:bg-[#f1e8dc] hover:text-[#854d38]"
                                                    >
                                                        Remove
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </article>
                                @endforeach
                            </div>
                        </div>

                        <aside class="border border-[#deddd4] bg-[#f7f5ef] p-6 sm:p-8 lg:sticky lg:top-6">
                            <p class="text-xs font-semibold tracking-[0.2em] text-[#bd7456] uppercase">Order summary</p>
                            <h2 class="mt-3 font-serif text-3xl text-[#232822]">Almost yours.</h2>

                            <div class="mt-7 flex items-center justify-between gap-4 border-t border-[#deddd4] pt-5">
                                <span class="text-sm text-[#62685f]">Items subtotal</span>
                                <span class="font-serif text-xl text-[#232822]">${{ number_format($cartTotal, 2) }}</span>
                            </div>

                            <p class="mt-3 text-xs leading-5 text-[#62685f]">
                                Shipping and any applicable taxes will be calculated at checkout.
                            </p>

                            <form action="{{ route('checkout.process') }}" method="POST" class="mt-7">
                                @csrf
                                <button
                                    type="submit"
                                    class="inline-flex w-full items-center justify-center gap-3 rounded-full bg-[#394b3b] px-5 py-3.5 text-sm font-semibold text-white transition hover:bg-[#576b56]"
                                >
                                    Proceed to checkout
                                    <svg aria-hidden="true" class="size-4" viewBox="0 0 20 20" fill="none">
                                        <path d="M4.167 10h11.666M10 4.167 15.833 10 10 15.833" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </button>
                            </form>
                        </aside>
                    </div>
                @endif
            </div>
        </section>
    </main>
</x-layout>
