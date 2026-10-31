<x-layout>
    <main class="overflow-hidden bg-[#f7f5ef] text-[#182321]">
        <section class="mx-auto grid max-w-7xl items-center gap-12 px-6 py-14 sm:px-10 lg:grid-cols-[1fr_0.95fr] lg:gap-16 lg:px-12 lg:py-20">
            <div class="max-w-2xl">
                <p class="mb-6 inline-flex items-center gap-2 rounded-full border border-[#d8d6ca] bg-white/70 px-4 py-2 text-xs font-semibold tracking-[0.18em] text-[#52615b] uppercase">
                    <span class="size-2 rounded-full bg-[#d8754e]"></span>
                    A collection of collections
                </p>

                <h1 class="max-w-xl font-serif text-5xl leading-[1.08] tracking-tight sm:text-6xl lg:text-7xl">
                    Good things are worth <span class="text-[#b65e3e] italic">keeping.</span>
                </h1>

                <p class="mt-6 max-w-lg text-lg leading-8 text-[#59645e]">
                    From well-loved records to original art, explore the stories, objects, and little discoveries that make a collection your own.
                </p>

                <div class="mt-9 flex flex-wrap items-center gap-4">
                    <a href="{{ route('music/index') }}" class="inline-flex items-center gap-3 rounded-full bg-[#1d302b] px-6 py-3.5 text-sm font-semibold text-white transition hover:bg-[#30483f]">
                        Explore the collection
                        <svg aria-hidden="true" class="size-4" viewBox="0 0 20 20" fill="none">
                            <path d="M4.167 10h11.666M10 4.167 15.833 10 10 15.833" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </a>
                    <a href="{{ route('about') }}" class="text-sm font-semibold text-[#46544e] underline decoration-[#b9c0b9] underline-offset-4 transition hover:text-[#b65e3e]">
                        A little about us
                    </a>
                </div>

                <div class="mt-12 flex items-center gap-4 border-t border-[#dedbd2] pt-6">
                    <div class="flex -space-x-2">
                        <span class="grid size-9 place-items-center rounded-full border-2 border-[#f7f5ef] bg-[#d9e0d5] text-xs font-semibold text-[#30483f]">M</span>
                        <span class="grid size-9 place-items-center rounded-full border-2 border-[#f7f5ef] bg-[#e8d6c6] text-xs font-semibold text-[#774a35]">A</span>
                        <span class="grid size-9 place-items-center rounded-full border-2 border-[#f7f5ef] bg-[#e8e4d8] text-xs font-semibold text-[#5b5c48]">C</span>
                    </div>
                    <p class="text-sm leading-6 text-[#68736d]">
                        A thoughtful mix of <span class="font-semibold text-[#26352f]">music, art, comics</span> and more.
                    </p>
                </div>
            </div>

            <div class="relative mx-auto w-full max-w-xl">
                <div class="absolute -top-7 right-8 size-24 rounded-full bg-[#e6b678]/45 blur-2xl sm:right-14"></div>
                <div class="absolute -bottom-8 -left-7 size-32 rounded-full bg-[#aab9a8]/50 blur-2xl"></div>
                <div class="relative overflow-hidden rounded-[2rem] border-[10px] border-white bg-[#e6e1d4] shadow-[0_28px_70px_-35px_rgba(24,35,33,0.5)]">
                    <img
                        src="{{ asset('images/paintings/1791158140.jpg') }}"
                        alt="A painting from the original art collection"
                        class="aspect-[4/4.5] w-full object-cover"
                    />
                    <div class="absolute left-6 top-6 rounded-full bg-white/90 px-4 py-2 text-xs font-semibold tracking-[0.16em] text-[#34443c] uppercase shadow-sm">
                        Collected by hand
                    </div>
                </div>

                <div class="absolute -bottom-6 -left-5 flex max-w-[15rem] items-center gap-4 rounded-2xl border border-[#e7e2d7] bg-white p-3 shadow-xl sm:-left-10 sm:bottom-8">
                    <img
                        src="{{ asset('storage/images/Albums/abbeyroad.jpg') }}"
                        alt="Abbey Road album cover"
                        class="size-16 rounded-xl object-cover"
                    />
                    <div>
                        <p class="text-[0.65rem] font-semibold tracking-[0.16em] text-[#89918b] uppercase">On the shelf</p>
                        <p class="mt-1 text-sm font-semibold text-[#24332d]">Records with a past</p>
                    </div>
                    <span aria-hidden="true" class="ml-auto grid size-8 shrink-0 place-items-center rounded-full bg-[#f5eee4] text-[#a75c3c]">
                        <svg class="size-4" viewBox="0 0 20 20" fill="none">
                            <path d="M10 3.333v13.334M3.333 10h13.334" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                        </svg>
                    </span>
                </div>

                <div class="absolute -right-3 top-8 hidden rotate-3 rounded-xl bg-[#e8b779] px-4 py-3 text-center shadow-lg sm:block">
                    <p class="font-serif text-xl leading-none text-[#513f2b]">Since</p>
                    <p class="mt-1 text-[0.65rem] font-semibold tracking-[0.14em] text-[#684e32] uppercase">always curious</p>
                </div>
            </div>
        </section>

        <section class="border-y border-[#e6e2d8] bg-[#efede5]">
            <div class="mx-auto max-w-7xl px-6 py-16 sm:px-10 lg:px-12 lg:py-20">
                <div class="mb-9 flex flex-wrap items-end justify-between gap-5">
                    <div>
                        <p class="text-xs font-semibold tracking-[0.2em] text-[#a45a3d] uppercase">Find your favorite corner</p>
                        <h2 class="mt-3 font-serif text-3xl tracking-tight sm:text-4xl">Explore the collections</h2>
                    </div>
                    <p class="max-w-md text-sm leading-6 text-[#66716a]">
                        Every shelf has its own character. Pick a place to start and take a closer look.
                    </p>
                </div>

                <div class="grid gap-5 sm:grid-cols-2 lg:grid-cols-4">
                    <a href="{{ route('music/index') }}" class="group overflow-hidden rounded-2xl border border-[#e1ddd2] bg-white transition duration-300 hover:-translate-y-1 hover:shadow-xl">
                        <div class="overflow-hidden bg-[#e5e2d9]">
                            <img src="{{ asset('storage/images/Albums/abbeyroad.jpg') }}" alt="Classic album cover in the music collection" class="aspect-[4/3] w-full object-cover transition duration-500 group-hover:scale-105" />
                        </div>
                        <div class="flex items-center justify-between gap-3 p-5">
                            <div>
                                <p class="text-xs font-semibold tracking-[0.16em] text-[#a45a3d] uppercase">01 / Listen</p>
                                <h3 class="mt-2 font-serif text-xl">Music &amp; records</h3>
                            </div>
                            <span class="grid size-9 shrink-0 place-items-center rounded-full border border-[#dedbd2] transition group-hover:border-[#1d302b] group-hover:bg-[#1d302b] group-hover:text-white">
                                <svg aria-hidden="true" class="size-4" viewBox="0 0 20 20" fill="none">
                                    <path d="M4.167 10h11.666M10 4.167 15.833 10 10 15.833" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </span>
                        </div>
                    </a>

                    <a href="{{ route('paintings.index') }}" class="group overflow-hidden rounded-2xl border border-[#e1ddd2] bg-white transition duration-300 hover:-translate-y-1 hover:shadow-xl">
                        <div class="overflow-hidden bg-[#e5e2d9]">
                            <img src="{{ asset('images/paintings/1791158557.jpg') }}" alt="Original painting from the art collection" class="aspect-[4/3] w-full object-cover transition duration-500 group-hover:scale-105" />
                        </div>
                        <div class="flex items-center justify-between gap-3 p-5">
                            <div>
                                <p class="text-xs font-semibold tracking-[0.16em] text-[#a45a3d] uppercase">02 / Look</p>
                                <h3 class="mt-2 font-serif text-xl">Original art</h3>
                            </div>
                            <span class="grid size-9 shrink-0 place-items-center rounded-full border border-[#dedbd2] transition group-hover:border-[#1d302b] group-hover:bg-[#1d302b] group-hover:text-white">
                                <svg aria-hidden="true" class="size-4" viewBox="0 0 20 20" fill="none">
                                    <path d="M4.167 10h11.666M10 4.167 15.833 10 10 15.833" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </span>
                        </div>
                    </a>

                    <a href="{{ route('comicbooks/index') }}" class="group overflow-hidden rounded-2xl border border-[#e1ddd2] bg-white transition duration-300 hover:-translate-y-1 hover:shadow-xl">
                        <div class="overflow-hidden bg-[#e5e2d9]">
                            <img src="{{ asset('images/Comicbooks/abouttime.jpg') }}" alt="Comic book cover from the comic collection" class="aspect-[4/3] w-full object-cover transition duration-500 group-hover:scale-105" />
                        </div>
                        <div class="flex items-center justify-between gap-3 p-5">
                            <div>
                                <p class="text-xs font-semibold tracking-[0.16em] text-[#a45a3d] uppercase">03 / Read</p>
                                <h3 class="mt-2 font-serif text-xl">Comic books</h3>
                            </div>
                            <span class="grid size-9 shrink-0 place-items-center rounded-full border border-[#dedbd2] transition group-hover:border-[#1d302b] group-hover:bg-[#1d302b] group-hover:text-white">
                                <svg aria-hidden="true" class="size-4" viewBox="0 0 20 20" fill="none">
                                    <path d="M4.167 10h11.666M10 4.167 15.833 10 10 15.833" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </span>
                        </div>
                    </a>

                    <a href="{{ route('tabletalks/index') }}" class="group overflow-hidden rounded-2xl border border-[#e1ddd2] bg-white transition duration-300 hover:-translate-y-1 hover:shadow-xl">
                        <div class="overflow-hidden bg-[#e5e2d9]">
                            <img src="{{ asset('images/Tabletalk/11thcentury.jpg') }}" alt="Tabletalk cover from the reading collection" class="aspect-[4/3] w-full object-cover transition duration-500 group-hover:scale-105" />
                        </div>
                        <div class="flex items-center justify-between gap-3 p-5">
                            <div>
                                <p class="text-xs font-semibold tracking-[0.16em] text-[#a45a3d] uppercase">04 / Discover</p>
                                <h3 class="mt-2 font-serif text-xl">Tabletalk</h3>
                            </div>
                            <span class="grid size-9 shrink-0 place-items-center rounded-full border border-[#dedbd2] transition group-hover:border-[#1d302b] group-hover:bg-[#1d302b] group-hover:text-white">
                                <svg aria-hidden="true" class="size-4" viewBox="0 0 20 20" fill="none">
                                    <path d="M4.167 10h11.666M10 4.167 15.833 10 10 15.833" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </span>
                        </div>
                    </a>
                </div>
            </div>
        </section>

        <section class="mx-auto max-w-7xl px-6 py-14 sm:px-10 lg:px-12 lg:py-20">
            <div class="grid items-center gap-8 rounded-[1.75rem] bg-[#1d302b] px-7 py-9 text-white sm:px-10 lg:grid-cols-[1fr_auto] lg:px-14 lg:py-12">
                <div>
                    <p class="text-xs font-semibold tracking-[0.2em] text-[#e2b27a] uppercase">Take your time</p>
                    <h2 class="mt-3 max-w-2xl font-serif text-3xl leading-tight sm:text-4xl">There is always one more story to find.</h2>
                    <p class="mt-4 max-w-xl text-sm leading-6 text-white/70">
                        Browse at your own pace, revisit an old favorite, or discover something new for your shelf.
                    </p>
                </div>
                <a href="{{ route('comicbooks/index') }}" class="inline-flex w-fit items-center gap-3 rounded-full bg-[#e2b27a] px-6 py-3.5 text-sm font-semibold text-[#1d302b] transition hover:bg-[#edc895]">
                    Find your next favorite
                    <svg aria-hidden="true" class="size-4" viewBox="0 0 20 20" fill="none">
                        <path d="M4.167 10h11.666M10 4.167 15.833 10 10 15.833" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </a>
            </div>
        </section>
    </main>
</x-layout>
