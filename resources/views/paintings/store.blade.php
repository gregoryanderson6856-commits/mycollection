<x-layout>
    <form action="{{ route('paintings.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="image" required />
        <button type="submit">Upload</button>
    </form>
</x-layout>
