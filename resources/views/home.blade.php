<x-layout>
    <div class="container mx-auto rounded-lg bg-white px-6 py-8 shadow-xl ring ring-gray-900/5 dark:bg-gray-800">
        <div class="bg-blue-500 py-4 text-center text-white">
            <h1 class="text-4xl font-bold">Collections</h1>

            <p class="mt-4">Music Paintings Tabletalk Comicbooks</p>
        </div>
        <div class=" grid grid-cols-6 gap-4">
            <div>
                <x-sidebar />
            </div>
            <div class="col-start-2 col-end-7">
                <div class="text-gray-700">
                    <p class="first-letter:float-left first-letter:mr-3 first-letter:text-7xl first-letter:font-bold
                     first-letter:text-amber-900 first-line:tracking-widest first-line:uppercase text-white">
                        Welcome, to my collections. Look around and have a good time?
                    </p>
                   
                </div>   
                  <div class="mt-8">
                <div class="grid grid-cols-4 gap-4">
  <div>
    <img
                                        class="aspect-square pr-6"
                                        src="{{ Storage::url('public/images/Albums/abbeyroad.jpg') }}"
                                        alt="Uploaded Image"
                                        style="width: 250px; height: 200px"
                                    />
  </div>
  <div>
     <img
                                        class="aspect-square pr-6"
                                        src="{{ Storage::url('public/images/Albums/beatles65.jpg') }}"
                                        alt="Uploaded Image"
                                        style="width: 250px; height: 200px"
                                    />
  </div>
    <img
                                        class="aspect-square pr-6"
                                        src="{{ url('/images/paintings/1791571011.jpg') }}"
                                        alt="Uploaded Image"
                                        style="width: 250px; height: 200px"
                                    />
  <div>
     <img
                                        class="aspect-square pr-6"
                                        src="{{ url('/images/paintings/1791573709.jpg') }}"
                                        alt="Uploaded Image"
                                        style="width: 250px; height: 200px"
                                    />
  </div>
  <div>
     <img
                                        class="aspect-square pr-6"
                                        src="{{ url('/images/samples/advent.jpg') }}"
                                        alt="Uploaded Image"
                                        style="width: 250px; height: 300px"
                                    />
  </div>
  <div>
     <img
                                        class="aspect-square pr-6"
                                        src="{{ url('/images/samples/commongrace.jpg') }}"
                                        alt="Uploaded Image"
                                        style="width: 250px; height: 300px"
                                    />
  </div>
  <div>
     <img
                                        class="aspect-square pr-6"
                                        src="{{ url('/images/samples/beginning4.jpg') }}"
                                        alt="Uploaded Image"
                                        style="width: 250px; height: 300px"
                                    />
  </div>
  <div>
     <img
                                        class="aspect-square pr-6"
                                        src="{{ url('/images/samples/braindrain.jpg') }}"
                                        alt="Uploaded Image"
                                        style="width: 250px; height: 300px"
                                    />
  </div>
</div>   
                  </div>       
                          </div>
                          
        </div>
    </div>
</x-layout>
