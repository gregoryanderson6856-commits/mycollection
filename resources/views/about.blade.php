<x-layout>
    <main class="overflow-hidden bg-[#f7f5ef] text-[#182321]">
        <section class="mx-auto grid max-w-7xl items-center gap-12 px-6 py-14 sm:px-10 lg:grid-cols-[1fr_0.85fr] lg:gap-16 lg:px-12 lg:py-20">
            <div class="max-w-2xl">
                <p class="mb-6 inline-flex items-center gap-2 rounded-full border border-[#d8d6ca] bg-white/70 px-4 py-2 text-xs font-semibold tracking-[0.18em] text-[#52615b] uppercase">
                    <span class="size-2 rounded-full bg-[#d8754e]"></span>
                    A little about us
                </p>

                <h1 class="max-w-xl font-serif text-5xl leading-[1.08] tracking-tight sm:text-6xl lg:text-7xl">
                    Every collection starts with <span class="text-[#b65e3e] italic">curiosity.</span>
                </h1>

                <p class="mt-6 max-w-lg text-lg leading-8 text-[#59645e]">
                    This is a place for the things worth keeping: records that bring back a moment, art that makes you pause, and stories you want to come back to.
                </p>

                <p class="mt-4 max-w-lg leading-7 text-[#68736d]">
                    Browse the shelves, follow whatever catches your eye, and enjoy discovering something new among the familiar favorites.
                </p>

                <a href="{{ route('music/index') }}" class="mt-9 inline-flex items-center gap-3 rounded-full bg-[#1d302b] px-6 py-3.5 text-sm font-semibold text-white transition hover:bg-[#30483f]">
                    Explore the collection
                    <svg aria-hidden="true" class="size-4" viewBox="0 0 20 20" fill="none">
                        <path d="M4.167 10h11.666M10 4.167 15.833 10 10 15.833" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </a>
            </div>

            <div class="relative mx-auto w-full max-w-lg">
                <div class="absolute -right-7 top-4 size-28 rounded-full bg-[#e6b678]/45 blur-2xl"></div>
                <div class="absolute -bottom-8 -left-7 size-32 rounded-full bg-[#aab9a8]/50 blur-2xl"></div>
                <div class="relative overflow-hidden rounded-[2rem] border-[10px] border-white bg-[#e6e1d4] shadow-[0_28px_70px_-35px_rgba(24,35,33,0.5)]">
                    <img
                        src="{{ asset('images/paintings/1791158557.jpg') }}"
                        alt="An original painting from the collection"
                        class="aspect-[4/4.5] w-full object-cover"
                    />
                    <p class="absolute left-6 top-6 rounded-full bg-white/90 px-4 py-2 text-xs font-semibold tracking-[0.16em] text-[#34443c] uppercase shadow-sm">
                        Collected with care
                    </p>
                </div>
                <div class="absolute -bottom-5 -left-4 max-w-[16rem] rounded-2xl border border-[#e7e2d7] bg-white p-5 shadow-xl sm:-left-9 sm:bottom-8">
                    <p class="font-serif text-xl text-[#24332d]">A home for the things we love.</p>
                    <p class="mt-2 text-sm leading-6 text-[#68736d]">Music, art, comics, and more—each with a story to tell.</p>
                </div>
            </div>
        </section>

        <section class="border-y border-[#e6e2d8] bg-[#efede5]">
            <div class="mx-auto max-w-7xl px-6 py-14 sm:px-10 lg:px-12 lg:py-16">
                <div class="mb-8">
                    <p class="text-xs font-semibold tracking-[0.2em] text-[#a45a3d] uppercase">Make yourself at home</p>
                    <h2 class="mt-3 font-serif text-3xl tracking-tight sm:text-4xl">A few favorite ways to explore</h2>
                </div>

                <div class="grid gap-5 sm:grid-cols-3">
                    <a href="{{ route('music/index') }}" class="group rounded-2xl border border-[#e1ddd2] bg-white p-6 transition duration-300 hover:-translate-y-1 hover:shadow-xl">
                        <span class="text-xs font-semibold tracking-[0.16em] text-[#a45a3d] uppercase">01 / Listen</span>
                        <h3 class="mt-3 font-serif text-2xl">Find a favorite record</h3>
                        <p class="mt-3 text-sm leading-6 text-[#68736d]">Browse the music shelves and revisit an old favorite.</p>
                        <span class="mt-5 inline-flex items-center gap-2 text-sm font-semibold text-[#34443c] group-hover:text-[#b65e3e]">
                            Explore music
                            <span aria-hidden="true">&rarr;</span>
                        </span>
                    </a>

                    <a href="{{ route('paintings.index') }}" class="group rounded-2xl border border-[#e1ddd2] bg-white p-6 transition duration-300 hover:-translate-y-1 hover:shadow-xl">
                        <span class="text-xs font-semibold tracking-[0.16em] text-[#a45a3d] uppercase">02 / Look</span>
                        <h3 class="mt-3 font-serif text-2xl">Spend time with art</h3>
                        <p class="mt-3 text-sm leading-6 text-[#68736d]">Take a closer look at the paintings in the collection.</p>
                        <span class="mt-5 inline-flex items-center gap-2 text-sm font-semibold text-[#34443c] group-hover:text-[#b65e3e]">
                            Explore art
                            <span aria-hidden="true">&rarr;</span>
                        </span>
                    </a>

                    <a href="{{ route('comicbooks/index') }}" class="group rounded-2xl border border-[#e1ddd2] bg-white p-6 transition duration-300 hover:-translate-y-1 hover:shadow-xl">
                        <span class="text-xs font-semibold tracking-[0.16em] text-[#a45a3d] uppercase">03 / Read</span>
                        <h3 class="mt-3 font-serif text-2xl">Open a new story</h3>
                        <p class="mt-3 text-sm leading-6 text-[#68736d]">Discover comic books and find a story to take with you.</p>
                        <span class="mt-5 inline-flex items-center gap-2 text-sm font-semibold text-[#34443c] group-hover:text-[#b65e3e]">
                            Explore comics
                            <span aria-hidden="true">&rarr;</span>
                        </span>
                    </a>
                </div>
            </div>
        </section>
    </main>
</x-layout>
