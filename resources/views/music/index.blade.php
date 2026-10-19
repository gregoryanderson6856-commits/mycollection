<x-layout>
    <main class="container mx-auto flex-1 px-4 py-8">
        <!-- resources/views/albums/index.blade.php -->
        <div class="container mx-auto p-6">
            <div class="flex px-4 py-8">
                <h1 class="text-center font-bold text-white">Albums Gallery</h1>
            </div>
            <!-- Responsive Grid Layout Container -->
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                @foreach ($albums as $album)
                    <div class="col-md-2">
                        <div class="max-w-sm overflow-hidden rounded pt-5 pl-8 shadow-lg" style="background: gainsboro">
                            <img
                                class="aspect-square pr-6"
                                src="{{ asset('storage/images/Albums/' . $album->path) }}"
                                height="100px"
                                alt="Sunset in the mountains"
                            />
                            </a>
                            <div class="px-6 py-4">
                                <div class="mb-2 text-base font-bold text-gray-700">{{ $album->title }}</div>
                                <p class="text-base text-gray-700"></p>
                            </div>
                            <div class="px-6 py-4">
                                <span class="mr-2 mb-2 inline-block text-sm font-semibold text-gray-700">{{ $album->artist }}</span>
                                <span class="mr-2 mb-2 inline-block text-sm font-semibold text-gray-700">{{ $album->studio }}</span>
                                <span class="mr-2 mb-2 inline-block text-sm font-semibold text-gray-700">{{ $album->year }}</span>
                                <span class="mr-2 mb-2 inline-block text-sm font-semibold text-gray-700">{{ $album->format }}</span>
                                <a href="{{ route('music/show', $album->id) }}" class="btn btn-warning btn-sm"
                                    ><i class="bi bi-eye"></i> Details</a>
                            </div>
                        </div>
                    </div>
                @endforeach

                 <!-- Example of how a specific Comicbook item select looks in HTML -->
                    <form action="{{ route('cart.add') }}" method="POST">
                        @csrf
                        <!-- 1. The Hidden Identifiers (Hardcoded by the Blade loop rendering the page) -->
                        <input type="hidden" name="item_type" value="albums">
                        <input type="hidden" name="item_id" value="{{ $album->id }}">
                        
                        <!-- 2. The User Interaction Fields -->
                        <label for="qty">Quantity:</label>
                        <input type="number" id="qty" name="quantity" value="1" min="1">
                        
                        <button type="submit">Add to Cart</button>
                    </form>

                <div class="mt-6">{{ $albums->links('vendor.pagination.daisyui') }}</div>
            </div>
        </div>
    </main>
</x-layout>
