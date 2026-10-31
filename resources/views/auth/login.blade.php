<x-layout>
    <main class="overflow-hidden bg-[#f7f5ef] text-[#182321]">
        <section class="mx-auto grid max-w-7xl items-center gap-12 px-6 py-12 sm:px-10 lg:grid-cols-[1fr_0.85fr] lg:gap-16 lg:px-12 lg:py-16">
            <div class="max-w-2xl">
                <p class="mb-6 inline-flex items-center gap-2 rounded-full border border-[#d8d6ca] bg-white/70 px-4 py-2 text-xs font-semibold tracking-[0.18em] text-[#52615b] uppercase">
                    <span class="size-2 rounded-full bg-[#d8754e]"></span>
                    Welcome back
                </p>

                <h1 class="max-w-xl font-serif text-5xl leading-[1.08] tracking-tight sm:text-6xl lg:text-7xl">
                    Your collection is waiting <span class="text-[#b65e3e] italic">for you.</span>
                </h1>

                <p class="mt-6 max-w-lg text-lg leading-8 text-[#59645e]">
                    Sign in to pick up where you left off and keep exploring the things worth keeping.
                </p>

                <div class="relative mt-10 max-w-md">
                    <div class="absolute -right-5 -top-5 size-24 rounded-full bg-[#e6b678]/45 blur-2xl"></div>
                    <div class="relative overflow-hidden rounded-[1.75rem] border-[8px] border-white bg-[#e6e1d4] shadow-[0_28px_70px_-35px_rgba(24,35,33,0.5)]">
                        <img
                            src="{{ asset('images/paintings/1791158140.jpg') }}"
                            alt="A painting from the collection"
                            class="aspect-[16/10] w-full object-cover"
                        />
                    </div>
                </div>
            </div>

            <div class="relative mx-auto w-full max-w-lg">
                <div class="absolute -bottom-6 -left-6 size-28 rounded-full bg-[#aab9a8]/50 blur-2xl"></div>
                <div class="relative rounded-[1.75rem] border border-[#e7e2d7] bg-white p-7 shadow-[0_28px_70px_-35px_rgba(24,35,33,0.35)] sm:p-9">
                    <p class="text-xs font-semibold tracking-[0.2em] text-[#a45a3d] uppercase">Your shelves await</p>
                    <h2 class="mt-3 font-serif text-3xl tracking-tight sm:text-4xl">Sign in to your account</h2>
                    <p class="mt-3 text-sm leading-6 text-[#68736d]">Enter your name and password to continue.</p>

                    <form action="{{ route('auth/login') }}" method="post" class="mt-8 space-y-5">
                        @csrf

                        <div>
                            <label for="name" class="mb-2 block text-sm font-semibold text-[#34443c]">Name</label>
                            <input
                                class="w-full rounded-xl border border-[#dedbd2] bg-[#f7f5ef] px-4 py-3.5 text-[#182321] outline-none transition placeholder:text-[#89918b] focus:border-[#869588] focus:ring-2 focus:ring-[#aab9a8]/40"
                                type="text"
                                name="name"
                                placeholder="Your name"
                                id="name"
                                value="{{ old('name') }}"
                                autocomplete="username"
                                required
                            />
                        </div>

                        <div>
                            <label for="password" class="mb-2 block text-sm font-semibold text-[#34443c]">Password</label>
                            <input
                                class="w-full rounded-xl border border-[#dedbd2] bg-[#f7f5ef] px-4 py-3.5 text-[#182321] outline-none transition placeholder:text-[#89918b] focus:border-[#869588] focus:ring-2 focus:ring-[#aab9a8]/40"
                                type="password"
                                name="password"
                                placeholder="Your password"
                                id="password"
                                autocomplete="current-password"
                                required
                            />
                        </div>

                        @if ($errors->any())
                            <div role="alert" class="space-y-1 rounded-xl border border-[#e7c7b9] bg-[#fcf1ec] p-4 text-sm leading-6 text-[#873e2b]">
                                @foreach ($errors->all() as $error)
                                    <p>{{ $error }}</p>
                                @endforeach
                            </div>
                        @endif

                        <button class="inline-flex w-full items-center justify-center gap-3 rounded-full bg-[#1d302b] px-6 py-3.5 text-sm font-semibold text-white transition hover:bg-[#30483f] focus:outline-none focus:ring-2 focus:ring-[#718277] focus:ring-offset-2" type="submit">
                            Login
                            <svg aria-hidden="true" class="size-4" viewBox="0 0 20 20" fill="none">
                                <path d="M4.167 10h11.666M10 4.167 15.833 10 10 15.833" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </button>
                    </form>

                    <p class="mt-6 border-t border-[#e8e4db] pt-5 text-center text-sm text-[#68736d]">
                        Don’t have an account?
                        <a href="{{ route('auth/register') }}" class="font-semibold text-[#34443c] underline decoration-[#b9c0b9] underline-offset-4 transition hover:text-[#b65e3e]">Register</a>
                    </p>
                </div>
            </div>
        </section>
    </main>
</x-layout>
