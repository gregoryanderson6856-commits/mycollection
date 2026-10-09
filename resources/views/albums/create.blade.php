<x-layout>
    <div class="row justify-content-center mt-3">
        <div class="col-md-8">
            <div class="card flex, pt-4, text-center">
                <div class="card-header">
                    <div class="float-start">Add New Album</div>
                    <div class="float-end">
                        <a href="{{ route('albums.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('albums.store') }}" method="post">
                        @csrf

                        <div class="row mb-3">
                            <label for="band_id" class="col-md-4 col-form-label text-md-end text-start">Band Id</label>
                            <div class="col-md-6">
                                <input
                                    type="number"
                                    class="form-control @error('band_id') is-invalid @enderror  mb-4 border p-4"
                                    id="band_id"
                                    name="band_id"
                                    value="{{ old('band_id') }}"
                                />
                                @error('band_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="title" class="col-md-4 col-form-label text-md-end text-start">Title</label>
                            <div class="col-md-6">
                                <input
                                    type="text"
                                    class="form-control @error('title') is-invalid @enderror mb-4 border p-4"
                                    id="title"
                                    name="title"
                                    value="{{ old('title') }}"
                                />
                                @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="label" class="col-md-4 col-form-label text-md-end text-start">Label</label>
                            <div class="col-md-6">
                                <input
                                    type="text"
                                    step="0.01"
                                    class="form-control @error('label') is-invalid @enderror mb-4 border p-4"
                                    id="label"
                                    name="label"
                                    value="{{ old('label') }}"
                                />
                                @error('label')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="year" class="col-md-4 col-form-label text-md-end text-start">Year</label>
                            <div class="col-md-6">
                                <textarea
                                    class="form-control @error('year') is-invalid @enderror mb-4 border p-4"
                                    id="year"
                                    name="year"
                                >{{ old('year') }}</textarea>
                                @error('year')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="format" class="col-md-4 col-form-label text-md-end text-start">Format</label>
                            <div class="col-md-6">
                                <input
                                    type="text"
                                    step="0.01"
                                    class="form-control @error('format') is-invalid @enderror mb-4 border p-4"
                                    id="format"
                                    name="format"
                                    value="{{ old('format') }}"
                                />
                                @error('format')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="path" class="col-md-4 col-form-label text-md-end text-start">Path</label>
                            <div class="col-md-6">
                                <input
                                    type="text"
                                    class="form-control @error('path') is-invalid @enderror mb-4 border p-4"
                                    id="path"
                                    name="path"
                                    value="{{ old('path') }}"
                                />
                                @error('path')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <button type="submit" class="btn btn-success">Create Album</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>
