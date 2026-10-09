<x-layout>
    <div class="container mx-auto rounded-lg bg-white px-6 py-8 shadow-xl ring ring-gray-900/5 dark:bg-gray-800">
        <div class="bg-blue-500 py-4 text-center text-white">
            <h1 class="text-4xl font-bold">Register</h1>

            <p class="mt-4">A utility-first CSS framework.</p>
        </div>
        <div class="grid grid-cols-3 gap-4">
            <div>
                <x-sidebar />
            </div>

            <div>
                <div class="flex h-screen items-center justify-center">
                    <form action="{{ route('auth/register') }}" method="post" class="form form-label">
                        @csrf

                        <div class="form-group">
                            <input
                                class="form-input w-full border p-4"
                                type="text"
                                name="name"
                                placeholder="Name"
                                id="name"
                                value="{{ old('name') }}"
                                required
                            />
                        </div>

                        <div class="form-group">
                            <input
                                class="form-input mt-4 w-full border p-4"
                                type="email"
                                name="email"
                                placeholder="Email"
                                id="email"
                                value="{{ old('email') }}"
                                required
                            />
                        </div>

                        <div class="form-group mb-5">
                            <input
                                class="form-input mt-4 w-full border p-4"
                                type="password"
                                name="password"
                                placeholder="Password"
                                id="password"
                                autocomplete="new-password"
                                required
                            />
                        </div>

                        @if ($errors->any())
                            <div class="msg error">
                                @foreach ($errors->all() as $error)
                                    <p>{{ $error }}</p>
                                @endforeach
                            </div>
                        @endif

                        <button class="btn-primary" type="submit">Register</button>

                        <p class="text-white">Already have an account? <a href="" class="link">Login</a></p>
                    </form>
                </div>
            </div>
            <div>Col 3</div>
        </div>
    </div>
</x-layout>
