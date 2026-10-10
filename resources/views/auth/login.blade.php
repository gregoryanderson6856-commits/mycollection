<x-layout>
    <div class="container mx-auto rounded-lg bg-white px-6 py-8 shadow-xl ring ring-gray-900/5 dark:bg-gray-800">
        <div class="bg-blue-500 py-4 text-center text-white">
            <h1 class="text-4xl font-bold">Login</h1>

            <p class="mt-4">Music Paintings Tabletalk Comicbooks</p>
        </div>
        <div class="grid grid-cols-3 gap-4">
            <div>
                <x-sidebar />
            </div>

            <div>
                <div class="flex h-screen items-center justify-center">
                    <form action="{{ route('auth/login') }}" method="post" class="form login-form">
                        @csrf

                        <div class="form-group">
                            <input
                                class="form-input mb-4 w-full border p-4"
                                type="text"
                                name="name"
                                placeholder="Name"
                                id="name"
                                value="{{ old('name') }}"
                                required
                            />
                        </div>

                        <div class="form-group mb-5">
                            <input
                                class="form-input w-full border p-4"
                                type="password"
                                name="password"
                                placeholder="Password"
                                id="password"
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

                        <button class="btn btn-primary" type="submit">Login</button>

                        <p class="text-whit">
                            Don't have an account? <a href="{{ route('auth/register') }}" class="link">Register</a>
                        </p>
                    </form>
                </div>
            </div>
            <div>Col 3</div>
        </div>
    </div>
</x-layout>
