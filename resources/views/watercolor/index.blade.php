<x-layout>
    <main class="overflow-hidden bg-[#f7f5ef] text-[#182321]">
        <section class="mx-auto max-w-7xl px-6 py-14 sm:px-10 lg:px-12 lg:py-20">
            <div class="max-w-3xl">
                <p class="inline-flex items-center gap-2 rounded-full border border-[#d8d6ca] bg-white/70 px-4 py-2 text-xs font-semibold tracking-[0.18em] text-[#52615b] uppercase">
                    <span class="size-2 rounded-full bg-[#d8754e]"></span>
                    A collection of watercolors
                </p>

                <h1 class="mt-6 font-serif text-5xl leading-[1.08] tracking-tight sm:text-6xl">
                    The watercolor <span class="text-[#b65e3e] italic">gallery.</span>
                </h1>

                <p class="mt-6 max-w-2xl text-lg leading-8 text-[#59645e]">
                    Browse original paintings, revisit favorite pieces, and find a work of art to bring home.
                </p>
            </div>
        </section>

        <section class="border-y border-[#e6e2d8] bg-[#efede5]">
            <div class="mx-auto max-w-7xl px-6 py-12 sm:px-10 lg:px-12 lg:py-16">
                <div class="mb-9 flex flex-wrap items-end justify-between gap-5">
                    <div>
                        <p class="text-xs font-semibold tracking-[0.2em] text-[#a45a3d] uppercase">Collected over time</p>
                        <h2 class="mt-3 font-serif text-3xl tracking-tight sm:text-4xl">Watercolor paintings</h2>
                    </div>
                    <p class="max-w-md text-sm leading-6 text-[#66716a]">
                        Explore each original and discover a favorite worth keeping.
                    </p>
                </div>

                <div class="grid grid-cols-1 gap-2.5 sm:grid-cols-2 lg:grid-cols-4">
                    @forelse ($watercolors as $watercolor)
                        <article class="group overflow-hidden rounded-2xl border border-[#e1ddd2] bg-[#e5e2d9] transition duration-300 hover:-translate-y-1 hover:shadow-xl">
                            <div class="flex justify-center overflow-hidden bg-[#e5e2d9]">
                                <img
                                    src="{{ asset($watercolor->image_path) }}"
                                    alt="{{ $watercolor->name }}"
                                    class="aspect-square w-3/4 object-cover transition duration-500 group-hover:scale-105"
                                    loading="lazy"
                                />
                            </div>

                            <div class="mx-auto w-3/4 rounded-t-2xl rounded-b-2xl bg-white px-2 py-3">
                                <div class="text-center">
                                    <h3 class="font-serif text-sm leading-snug">{{ $watercolor->name }}</h3>
                                    <p class="mt-1 text-xs leading-tight text-[#68736d]">{{ $watercolor->size }}</p>
                                    <p class="mt-1 text-xs leading-tight text-[#68736d]">{{ $watercolor->month }} &middot; {{ $watercolor->year }}</p>
                                    @if ($watercolor->framed)
                                        <p class="mt-1 text-xs leading-tight text-[#68736d]">{{ $watercolor->framed }}</p>
                                    @endif
                                    @if ($watercolor->price)
                                        <p class="mx-auto mt-2 w-fit rounded-full bg-[#f5eee4] px-2 py-1 text-xs font-semibold text-[#a75c3c]">
                                            ${{ $watercolor->price }}
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </article>
                    @empty
                        <p class="col-span-1 rounded-2xl border border-[#e1ddd2] bg-white px-6 py-8 text-[#59645e] sm:col-span-2 lg:col-span-4">
                            No paintings are available right now. Please check back soon.
                        </p>
                    @endforelse
                </div>

                @if ($watercolors->hasPages())
                    <div class="mt-10">
                        {{ $watercolors->links() }}
                    </div>
                @endif
            </div>
        </section>
    </main>
</x-layout>
