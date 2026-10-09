<x-layout>
    <div class="row justify-content-center mt-3">
        <div class="col-md-12">
            <div class="mb-5 text-center">
                <a href="{{ route('songs.create') }}" class="btn btn-warning"> Add New Song</a>
            </div>

            <div class="card">
                <div class="card-header flex, pt-4, text-center">Song List</div>
                <div class="card-body">
                    <table class="table-striped table-bordered table">
                        <thead>
                            <tr>
                                <th scope="col">Song Id</th>
                                <th scope="col">Album</th>
                                <th scope="col">Title</th>
                                <th scope="col">Author</th>
                                <th scope="col">Duration</th>
                                <th scope="col">Side</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($songs as $song)
                                <tr>
                                    <td>{{ $song->song_id }}</td>
                                    <td>{{ $song->album_id }}</td>
                                    <td>{{ $song->title }}</td>
                                    <td>{{ $song->songwriter }}</td>
                                    <td>{{ $song->duration }}</td>
                                    <td>{{ $song->side }}</td>
                                    <td>
                                        <form action="{{ route('songs.destroy', $song->song_id) }}" method="post">
                                            @csrf
                                            @method('DELETE')

                                            <a
                                                href="{{ route('songs.show', $song->song_id) }}"
                                                class="btn btn-warning btn-sm"
                                            ><i class="bi bi-eye"></i> Show</a>

                                            <a
                                                href="{{ route('songs.edit', $song->song_id) }}"
                                                class="btn btn-primary btn-sm"
                                            ><i class="bi bi-pencil-square"></i> Edit</a>

                                            <button
                                                type="submit"
                                                class="btn btn-danger btn-sm"
                                                onclick="return confirm('Do you want to delete this song?');"
                                            >
                                                <i class="bi bi-trash"></i> Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <td colspan="6">
                                    <span class="text-danger">
                                        <strong>No Song Found!</strong>
                                    </span>
                                </td>

                            @endforelse
                        </tbody>
                    </table>

                    {{ $songs->links() }}
                </div>
            </div>
        </div>
    </div>
</x-layout>
