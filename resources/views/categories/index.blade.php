<x-layout>

    @foreach ($items as $item)
    <p>{{ $item->categories_name }} {{ $item->item_type }}  </p>
@endforeach

</x-layout>