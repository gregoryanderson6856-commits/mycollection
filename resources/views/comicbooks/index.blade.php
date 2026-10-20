<x-layout>
     <main class="container mx-auto flex-1 px-4 py-8">
        <!-- resources/views/comicbooks/index.blade.php -->
        <div class="container mx-auto p-6">
            <div class="flex px-4 py-8">
                <h1 class="text-center font-bold text-white">Comicbook Gallery</h1>
            </div>
            <!-- Responsive Grid Layout Container -->
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                @foreach ($comics as $comic)
                    <div class="col-md-2">
                        <div class="max-w-sm overflow-hidden rounded pt-5 pl-8 shadow-lg" style="background: gainsboro">
                            <img
                                class="size-92 w-3/4 ml-4"
                                src="{{  asset('/images/Comicbooks/' . $comic->imagePath )}}"
                                height="100px"
                                alt="Sunset in the mountains"
                            />
                            </a>
                            <div class="px-6 py-4">
                                <div class="mb-2 text-base font-bold text-gray-700">{{ $comic->title }}</div>
                               
                            </div>
                            <div class="px-6 py-4">
                                <span class="mr-2 mb-2 inline-block text-sm font-semibold text-gray-700">{{ $comic->story }}</span>
                            </div>
                             <div class="px-6 py-4">
                                 <span class="mr-2 mb-2 inline-block text-sm font-semibold text-gray-700">{{ $comic->month }}</span>
                                <span class="mr-2 mb-2 inline-block text-sm font-semibold text-gray-700">{{ $comic->year }}</span>
                                <span class="mr-2 mb-2 inline-block text-sm font-semibold text-gray-700">${{ $comic->price }}</span>
                                 <span class="mr-2 mb-2 inline-block text-sm font-semibold text-gray-700">
                                     <!-- Example of how a specific Comicbook item select looks in HTML -->
                                    <form action="{{ route('cart.add') }}" method="POST">
                                        @csrf
                                        <!-- 1. The Hidden Identifiers (Hardcoded by the Blade loop rendering the page) -->
                                        <input type="hidden" name="item_type" value="comicbooks">
                                        <input type="hidden" name="item_id" value="{{ $comic->id }}">
                                        
                                        <!-- 2. The User Interaction Fields -->
                        
                                        <input type="hidden" id="qty" name="quantity" value="1" min="1">
                                        
                                        <button type="submit">Add to Cart</button>
                                    </form>
                                </span>
                            </div>
                        </div>
                    </div>
                @endforeach

                <div class="mt-6"> {{ $comics->links() }}</div>
            </div>
        </div>
    </main>
</x-layout>
