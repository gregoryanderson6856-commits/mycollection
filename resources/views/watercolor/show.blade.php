<x-layout>
    <main class="overflow-hidden bg-[#f7f5ef] text-[#182321]">
        <section class="mx-auto max-w-7xl px-6 py-12 sm:px-10 lg:px-12 lg:py-16">
            <a
                href="{{ route('watercolor/index') }}"
                class="inline-flex items-center gap-2 rounded-full border border-[#d8d6ca] bg-white/70 px-4 py-2 text-sm font-semibold text-[#46544e] transition hover:border-[#1d302b] hover:text-[#b65e3e]"
            >
                <svg aria-hidden="true" class="size-4 rotate-180" viewBox="0 0 20 20" fill="none">
                    <path d="M4.167 10h11.666M10 4.167 15.833 10 10 15.833" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                Back to watercolors
            </a>

            <div class="mt-8 max-w-3xl">
                <p class="inline-flex items-center gap-2 rounded-full border border-[#d8d6ca] bg-white/70 px-4 py-2 text-xs font-semibold tracking-[0.18em] text-[#52615b] uppercase">
                    <span class="size-2 rounded-full bg-[#d8754e]"></span>
                    From the watercolor collection
                </p>

                <h1 class="mt-6 font-serif text-5xl leading-[1.08] tracking-tight sm:text-6xl">
                    {{ $watercolor->name }}
                </h1>

                <p class="mt-4 text-lg leading-8 text-[#59645e]">
                    {{ $watercolor->month }} <span aria-hidden="true">&middot;</span> {{ $watercolor->year }}
                </p>
            </div>
        </section>

        <section class="border-y border-[#e6e2d8] bg-[#efede5]">
            <div class="mx-auto grid max-w-7xl gap-6 px-6 py-10 sm:px-10 lg:grid-cols-[0.85fr_1.15fr] lg:gap-8 lg:px-12 lg:py-16">
                <article class="h-fit overflow-hidden rounded-2xl border border-[#e1ddd2] bg-[#e5e2d9] shadow-sm">
                    <div class="flex justify-center p-5 sm:p-8">
                        <img
                            src="{{ asset($watercolor->image_path) }}"
                            alt="{{ $watercolor->name }}"
                            class="w-full rounded-xl object-contain shadow-lg"
                        />
                    </div>

                    <div class="rounded-t-2xl rounded-b-2xl bg-white px-5 py-5 text-center sm:px-8">
                        <p class="text-xs font-semibold tracking-[0.18em] text-[#a45a3d] uppercase">Painting details</p>
                        <p class="mt-2 font-serif text-2xl">{{ $watercolor->name }}</p>
                        <p class="mt-2 text-sm leading-6 text-[#68736d]">
                            {{ $watercolor->size }}
                            <span aria-hidden="true">&middot;</span> {{ $watercolor->month }} {{ $watercolor->year }}
                            @if ($watercolor->framed)
                                <span aria-hidden="true">&middot;</span> {{ $watercolor->framed }}
                            @endif
                        </p>
                        @if ($watercolor->price)
                            <p class="mx-auto mt-4 w-fit rounded-full bg-[#f5eee4] px-4 py-2 text-sm font-semibold text-[#a75c3c]">
                                ${{ $watercolor->price }}
                            </p>
                        @endif
                    </div>
                </article>

                <article class="rounded-2xl border border-[#e1ddd2] bg-white p-6 shadow-sm sm:p-8">
                    <div class="border-b border-[#e6e2d8] pb-6">
                        <p class="text-xs font-semibold tracking-[0.2em] text-[#a45a3d] uppercase">The story behind the painting</p>
                        <h2 class="mt-3 font-serif text-3xl tracking-tight sm:text-4xl">Watercolor catalog</h2>
                        <p class="mt-3 text-sm leading-6 text-[#59645e]">
                            An original watercolor from the collection.
                        </p>
                    </div>

                    <dl class="grid gap-5 py-6 sm:grid-cols-2">
                        <div>
                            <dt class="text-xs font-semibold tracking-[0.16em] text-[#a45a3d] uppercase">Size</dt>
                            <dd class="mt-2 text-sm text-[#26352f]">{{ $watercolor->size }}</dd>
                        </div>
                        <div>
                            <dt class="text-xs font-semibold tracking-[0.16em] text-[#a45a3d] uppercase">SKU</dt>
                            <dd class="mt-2 text-sm text-[#26352f]">{{ $watercolor->sku }}</dd>
                        </div>
                        <div>
                            <dt class="text-xs font-semibold tracking-[0.16em] text-[#a45a3d] uppercase">Date</dt>
                            <dd class="mt-2 text-sm text-[#26352f]">{{ $watercolor->month }} {{ $watercolor->year }}</dd>
                        </div>
                        @if ($watercolor->framed)
                            <div>
                                <dt class="text-xs font-semibold tracking-[0.16em] text-[#a45a3d] uppercase">Presentation</dt>
                                <dd class="mt-2 text-sm text-[#26352f]">{{ $watercolor->framed }}</dd>
                            </div>
                        @endif
                    </dl>

                    @auth
                        <form action="{{ route('cart.add') }}" method="POST" class="border-t border-[#e6e2d8] pt-6">
                            @csrf
                            <input type="hidden" name="item_type" value="paintings">
                            <input type="hidden" name="item_id" value="{{ $watercolor->id }}">
                            <input type="hidden" name="quantity" value="1">

                            <button
                                type="submit"
                                class="inline-flex w-full items-center justify-center gap-2 rounded-full bg-[#1d302b] px-5 py-3 text-sm font-semibold text-white transition hover:bg-[#30483f]"
                            >
                                Add to cart
                                <svg aria-hidden="true" class="size-4" viewBox="0 0 20 20" fill="none">
                                    <path d="M4.167 10h11.666M10 4.167 15.833 10 10 15.833" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </button>
                        </form>
                    @endauth
                </article>
            </div>
        </section>
    </main>
</x-layout>
