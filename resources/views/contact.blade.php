<x-layout>
    <main class="overflow-hidden bg-[#f7f5ef] text-[#182321]">
        <section class="mx-auto max-w-7xl px-6 py-14 sm:px-10 lg:px-12 lg:py-20">
            <div class="grid gap-12 lg:grid-cols-[0.95fr_1.05fr] lg:items-center lg:gap-16">
                <div class="max-w-2xl">
                    <p class="mb-6 inline-flex items-center gap-2 rounded-full border border-[#d8d6ca] bg-white/70 px-4 py-2 text-xs font-semibold tracking-[0.18em] text-[#52615b] uppercase">
                        <span class="size-2 rounded-full bg-[#d8754e]"></span>
                        Say hello
                    </p>

                    <h1 class="max-w-xl font-serif text-5xl leading-[1.08] tracking-tight sm:text-6xl lg:text-7xl">
                        We’d love to hear <span class="text-[#b65e3e] italic">from you.</span>
                    </h1>

                    <p class="mt-6 max-w-lg text-lg leading-8 text-[#59645e]">
                        Have a question about the collection, spotted something you love, or just want to say hello? Drop us a note.
                    </p>

                    <div class="mt-9 flex flex-wrap items-center gap-4">
                        <a href="mailto:support@collection.com" class="inline-flex items-center gap-3 rounded-full bg-[#1d302b] px-6 py-3.5 text-sm font-semibold text-white transition hover:bg-[#30483f]">
                            Email us
                            <svg aria-hidden="true" class="size-4" viewBox="0 0 20 20" fill="none">
                                <path d="M3.333 5.833 10 10.417l6.667-4.584M5 15h10a1.667 1.667 0 0 0 1.667-1.667V6.667A1.667 1.667 0 0 0 15 5H5a1.667 1.667 0 0 0-1.667 1.667v6.666A1.667 1.667 0 0 0 5 15Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a>
                        <a href="{{ route('home') }}" class="text-sm font-semibold text-[#46544e] underline decoration-[#b9c0b9] underline-offset-4 transition hover:text-[#b65e3e]">
                            Back to the homepage
                        </a>
                    </div>
                </div>

                <div class="relative">
                    <div class="absolute -right-6 -top-7 size-28 rounded-full bg-[#e6b678]/45 blur-2xl"></div>
                    <div class="absolute -bottom-7 -left-7 size-32 rounded-full bg-[#aab9a8]/50 blur-2xl"></div>
                    <div class="relative rounded-[2rem] border border-[#e7e2d7] bg-white p-7 shadow-[0_28px_70px_-35px_rgba(24,35,33,0.35)] sm:p-10">
                        <p class="text-xs font-semibold tracking-[0.2em] text-[#a45a3d] uppercase">Get in touch</p>
                        <h2 class="mt-3 font-serif text-3xl tracking-tight sm:text-4xl">Let’s start a conversation.</h2>
                        <p class="mt-4 max-w-md leading-7 text-[#68736d]">
                            Send us an email whenever you’re ready. We’re always glad to hear what brought you by.
                        </p>

                        <a href="mailto:support@collection.com" class="mt-8 flex items-center gap-4 rounded-2xl border border-[#e8e4db] bg-[#f7f5ef] p-4 transition hover:border-[#c8b9a2] sm:p-5">
                            <span class="grid size-12 shrink-0 place-items-center rounded-full bg-[#e8e4d8] text-[#34443c]">
                                <svg aria-hidden="true" class="size-5" viewBox="0 0 20 20" fill="none">
                                    <path d="M3.333 5.833 10 10.417l6.667-4.584M5 15h10a1.667 1.667 0 0 0 1.667-1.667V6.667A1.667 1.667 0 0 0 15 5H5a1.667 1.667 0 0 0-1.667 1.667v6.666A1.667 1.667 0 0 0 5 15Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </span>
                            <span class="min-w-0">
                                <span class="block text-xs font-semibold tracking-[0.14em] text-[#89918b] uppercase">Email</span>
                                <span class="mt-1 block break-all text-base font-semibold text-[#24332d] sm:text-lg">support@collection.com</span>
                            </span>
                            <svg aria-hidden="true" class="ml-auto size-5 shrink-0 text-[#a45a3d]" viewBox="0 0 20 20" fill="none">
                                <path d="M4.167 10h11.666M10 4.167 15.833 10 10 15.833" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a>

                        <p class="mt-6 border-t border-[#e8e4db] pt-5 text-sm leading-6 text-[#68736d]">
                            Prefer to browse first? There’s plenty to discover across the
                            <a href="{{ route('music/index') }}" class="font-semibold text-[#34443c] underline decoration-[#b9c0b9] underline-offset-4 hover:text-[#b65e3e]">music</a>,
                            <a href="{{ route('paintings.index') }}" class="font-semibold text-[#34443c] underline decoration-[#b9c0b9] underline-offset-4 hover:text-[#b65e3e]">art</a>, and
                            <a href="{{ route('comicbooks/index') }}" class="font-semibold text-[#34443c] underline decoration-[#b9c0b9] underline-offset-4 hover:text-[#b65e3e]">comic book</a>
                            collections.
                        </p>
                    </div>
                </div>
            </div>
        </section>
    </main>
</x-layout>
