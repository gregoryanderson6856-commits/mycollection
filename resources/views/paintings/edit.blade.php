<x-layout>
    <div class="row justify-content-center mt-3">
        <div class="col-md-8">
            <div class="card flex, pt-4, text-center">
                <div class="card-header">
                    <div class="float-start">Edit Painting</div>
                    <div class="float-end">
                        <a href="{{ route('paintings.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                    </div>
                </div>

                <div class="card-body">
                    <form
                        action="{{ route('paintings.update', $painting) }}"
                        method="POST"
                        enctype="multipart/form-data"
                        class="mb-5"
                    >
                        @csrf
                        @method('PUT')

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end text-start">Name</label>
                            <div class="col-md-6">
                                <input
                                    type="text"
                                    class="form-control @error('name') is-invalid @enderror border p-4"
                                    id="name"
                                    name="name"
                                    value="{{ old('name', $painting->name) }}"
                                />
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="sku" class="col-md-4 col-form-label text-md-end text-start">Sku</label>
                            <div class="col-md-6">
                                <input
                                    type="text"
                                    class="form-control @error('sku') is-invalid @enderror border p-4"
                                    id="sku"
                                    name="sku"
                                    value="{{ old('sku', $painting->sku) }}"
                                />
                                @error('sku')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="size" class="col-md-4 col-form-label text-md-end text-start">Size</label>
                            <div class="col-md-6">
                                <input
                                    type="text"
                                    class="form-control @error('size') is-invalid @enderror border p-4"
                                    id="size"
                                    name="size"
                                    value="{{ old('size', $painting->size) }}"
                                />
                                @error('size')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="month" class="col-md-4 col-form-label text-md-end text-start">Month</label>
                            <div class="col-md-6">
                                <select id="month" name="month" class="select select-bordered">
                                    @foreach (['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'] as $month)
                                        <option
                                            value="{{ $month }}"
                                            @selected(old('month', $painting->month) === $month)
                                        >
                                            {{ $month }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('month')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="year" class="col-md-4 col-form-label text-md-end text-start">Year</label>
                            <div class="col-md-6">
                                <input
                                    type="text"
                                    class="form-control @error('year') is-invalid @enderror border p-4"
                                    id="year"
                                    name="year"
                                    value="{{ old('year', $painting->year) }}"
                                />
                                @error('year')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="framed" class="col-md-4 col-form-label text-md-end text-start">Framed</label>
                            <div class="col-md-6">
                                <select id="framed" name="framed" class="select select-bordered">
                                    @foreach (['Framed', 'Matted', 'Sold'] as $framing)
                                        <option
                                            value="{{ $framing }}"
                                            @selected(old('framed', $painting->framed) === $framing)
                                        >
                                            {{ $framing }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('framed')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="image" class="col-md-4 col-form-label text-md-end text-start">Replace Image</label>
                            <div class="col-md-6">
                                <img
                                    src="{{ asset('/' . $painting->image_path) }}"
                                    alt="{{ $painting->name }}"
                                    style="width: 140px; height: 90px; object-fit: cover"
                                />
                                <input
                                    type="file"
                                    name="image"
                                    id="image"
                                    class="form-control @error('image') is-invalid @enderror"
                                    accept="image/jpeg,image/png,image/gif"
                                />
                                @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary mt-2">Update Painting</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>
