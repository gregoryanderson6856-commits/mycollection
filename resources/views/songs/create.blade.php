<x-layout>
    <div class="row justify-content-center mt-3">
        <div class="col-md-8">
            <div class="card flex, pt-4, text-center">
                <div class="card-header">
                    <div class="float-start">Add New Song</div>
                    <div class="float-end">
                        <a href="{{ route('songs.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('songs.store') }}" method="post">
                        @csrf

                        <div class="row mb-3">
                            <label for="album_id" class="col-md-4 col-form-label text-md-end text-start border p-4"
                                >Album Id</label>
                            <div class="col-md-6">
                                <input
                                    type="number"
                                    class="form-control @error('album_id') is-invalid @enderror mb-4 border p-4"
                                    id="album_id"
                                    name="album_id"
                                    value="{{ old('album_id') }}"
                                />
                                @error('album_id')
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
                            <label for="songwriter" class="col-md-4 col-form-label text-md-end text-start"
                                >Song Writer</label>
                            <div class="col-md-6">
                                <input
                                    type="text"
                                    step="0.01"
                                    class="form-control @error('songwriter') is-invalid @enderror mb-4 border p-4"
                                    id="songwriter"
                                    name="songwriter"
                                    value="{{ old('songwriter') }}"
                                />
                                @error('songwriter')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="duration" class="col-md-4 col-form-label text-md-end text-start"
                                >Duration</label>
                            <div class="col-md-6">
                                <input
                                    type="text"
                                    step="0.01"
                                    class="form-control @error('duration') is-invalid @enderror mb-4 border p-4"
                                    id="duration"
                                    name="duration"
                                    value="{{ old('duration') }}"
                                />
                                @error('duration')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="side" class="col-md-4 col-form-label text-md-end text-start">Side</label>
                            <div class="col-md-6">
                                <input
                                    type="text"
                                    step="0.01"
                                    class="form-control @error('side') is-invalid @enderror mb-4 border p-4"
                                    id="side"
                                    name="side"
                                    value="{{ old('side') }}"
                                />
                                @error('side')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <button type="submit" class="btn btn-success">Create Song</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>
