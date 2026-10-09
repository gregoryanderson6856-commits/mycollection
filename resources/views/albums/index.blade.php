<x-layout>
    <div class="row justify-content-center mt-3">
        <div class="col-md-12">
            <div class="mb-5 text-center">
                <a href="{{ route('albums.create') }}" class="btn btn-warning"> Add New Album</a>
            </div>

            <div class="card">
                <div class="card-header flex, pt-4, text-center text-white">Album List</div>

                <div class="card-body text-white">
                    <table class="table-striped table-bordered table">
                        <thead>
                            <tr>
                                <th scope="col">Band</th>
                                <th scope="col">Title</th>
                                <th scope="col">Label</th>
                                <th scope="col">Year</th>
                                <th scope="col">Format</th>
                                <th scope="col">Cover</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($albums as $album)
                                <tr>
                                    <td>{{ $album->band_id }}</td>
                                    <td>{{ $album->title }}</td>
                                    <td>{{ $album->label }}</td>
                                    <td>{{ $album->year }}
                                    <td>{{ $album->format }}</td>
                                    </td>
                                    <td>
                                        <img
                                            src="{{ asset('storage/images/Albums/' . $album->path) }}"
                                            alt="Uploaded Image"
                                            width="100px"
                                            class="img-fluid"
                                        />
                                    </td>
                                    <td>
                                        <form action="{{ route('albums.destroy', $album->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')

                                            <a
                                                href="{{ route('albums.show', $album->id) }}"
                                                class="btn btn-warning btn-sm"
                                            >
                                                Show</a>

                                            <a
                                                href="{{ route('albums.edit', $album->id) }}"
                                                class="btn btn-primary btn-sm"
                                            >
                                                Edit</a>

                                            <button
                                                type="submit"
                                                class="btn btn-danger btn-sm"
                                                onclick="return confirm('Do you want to delete this album?');"
                                            >
                                                <i class="bi bi-trash"></i> Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <td colspan="6">
                                    <span class="text-danger">
                                        <strong>No Album Found!</strong>
                                    </span>
                                </td>

                            @endforelse
                        </tbody>
                    </table>

                    {{ $albums->links() }}
                </div>
            </div>
        </div>
    </div>
</x-layout>
