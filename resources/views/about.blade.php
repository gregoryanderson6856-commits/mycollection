<x-layout>
    <div class="container mx-auto rounded-lg bg-white px-6 py-8 shadow-xl ring ring-gray-900/5 dark:bg-gray-800">
        <div class="bg-blue-500 py-4 text-center text-white">
            <h1 class="text-4xl font-bold">About Us</h1>

          <x-banner />
        </div>
        <div class=" grid grid-cols-6 gap-4">
            <div>
                <x-sidebar />
            </div>
            <div class="col-start-2 col-end-7">
                <div class="container mx-auto mt-8 p-4">
                    
                </div>
               
                <blockquote class="text-center text-2xl font-semibold text-gray-900 italic dark:text-white">
                    When you look
                    <span class="relative inline-block before:absolute before:-inset-1 before:block before:-skew-y-3 before:bg-pink-500">
                        <span class="relative text-white dark:text-gray-950">annoyed</span>
                    </span>
                    all the time, people think that you're busy.
                </blockquote>
            </div>
        </div>
    </div>
</x-layout>
