<x-layout>
    <div class="container mt-5">
        <div class="mb-5 text-center">
            <a href="{{ route('paintings.create') }}" class="btn btn-warning"> Add New Painting</a>
        </div>

        <div class="card">
            <div class="card-header flex, pt-4, text-center text-white">Painting List</div>

            <div class="card-body text-white">
                <table class="table-striped table-bordered table">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Size</th>
                            <th scope="col">Sku</th>
                            <th scope="col">Month</th>
                            <th scope="col">Year</th>
                            <th scope="col">Image</th>
                            <th scope="col">Framed</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($images as $image)
                            <tr>
                                <td>{{ $image->name }}</td>
                                <td>{{ $image->size }}</td>
                                <td>{{ $image->sku }}</td>
                                <td>{{ $image->month }}</td>
                                <td>{{ $image->year }}</td>
                                
                                </td>
                                <td>
                                    <img
                                        class="aspect-square pr-6"
                                        src="{{ asset('/' . $image->image_path) }}"
                                        alt="Uploaded Image"
                                        style="width: 140px; height: 90px"
                                    />
                                </td>
                                 <td>{{ $image->framed }}</td>
                                <td>
                                    <form action="{{ route('paintings.destroy', $image->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')

                                        <a
                                            href="{{ route('paintings.show', $image->id) }}"
                                            class="btn btn-warning btn-sm"
                                        ><i class="bi bi-eye"></i> Show</a>

                                        <a
                                            href="{{ route('paintings.edit', $image->id) }}"
                                            class="btn btn-primary btn-sm"
                                        ><i class="bi bi-pencil-square"></i> Edit</a>

                                        <button
                                            type="submit"
                                            class="btn btn-danger btn-sm"
                                            onclick="return confirm('Do you want to delete this painting?');"
                                        >
                                            <i class="bi bi-trash"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <td colspan="6">
                                <span class="text-danger">
                                    <strong>No Painting Found!</strong>
                                </span>
                            </td>

                        @endforelse
                    </tbody>
                </table>
                {{ $images->links('vendor.pagination.daisyui') }}
            </div>
        </div>
    </div>
    </div>
</x-layout>
