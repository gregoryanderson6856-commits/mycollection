<x-layout>
    <div class="float-end">
        <a href="{{ url()->previous() }}" class="btn btn-primary btn-sm">&larr; Back</a>
    </div>
    <div class="mt-5 flex grid grid-cols-2 gap-4 px-4 py-8">
        <div>
            <img
                class="size-125"
                src="{{ asset('storage/images/albums/Albums/' . $album->path) }}"
                height="100px"
                alt="Sunset in the mountains"
            />
        </div>
        <div>
            <h1>Music Catalog</h1>

            @foreach ($albums as $data)
                @if ($data->band_id == $album->band_id && $data->id == $album->id)
                    <!-- Album Title & Artist Name -->
                    <h2>{{ $data->title }} -- {{ $data->label }} -- {{ $data->year }}</h2>
                    <p><strong>Artist:</strong> {{ $data->bands->name ?? 'Unknown Artist' }}</p>

                    <!-- Tracklist -->
                    <h3>Tracklist:</h3>
                    @if ($data->songs->isEmpty())
                        <p>No songs available for this album.</p>
                    @else
                        <ul>
                            @php $previousSide = null; @endphp
                            @foreach ($data->songs as $song)
                                @if ($previousSide !== null && $previousSide !== $song->side)
                                    <div class="my-6 border-t pt-4"></div>
                                @endif
                                <li>{{ $song->title }} -- {{ $song->songwriter }} -- ({{ $song->duration }})</li>
                                @php $previousSide = $song->side; @endphp
                            @endforeach
                        </ul>
                    @endif

                @endif
            @endforeach
            <h2>Run Time</h2>
            @foreach ($duration as $time)
                @if ($time->album_id == $album->id)
                    {{ $time->run_time }}

                @endif
            @endforeach
        </div>
    </div>
</x-layout>
