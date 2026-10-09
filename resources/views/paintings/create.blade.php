<x-layout>
    <div class="row justify-content-center mt-3">
        <div class="col-md-8">
            <div class="card flex, pt-4, text-center">
                <div class="card-header">
                    <div class="float-start">Add New Painting</div>
                    <div class="float-end">
                        <a href="{{ route('paintings.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                    </div>
                </div>

                <div class="card-body">
                    <form
                        action="{{ route('paintings.store') }}"
                        method="POST"
                        enctype="multipart/form-data"
                        class="mb-5"
                    >
                        @csrf
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end text-start">Name</label>
                            <div class="col-md-6">
                                <input
                                    type="text"
                                    class="form-control @error('name') is-invalid @enderror"
                                    id="name"
                                    name="name"
                                    value="{{ old('name') }}"
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
                                    class="form-control @error('sku') is-invalid @enderror"
                                    id="sku"
                                    name="sku"
                                    value="{{ old('sku') }}"
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
                                    class="form-control @error('size') is-invalid @enderror"
                                    id="size"
                                    name="size"
                                    value="{{ old('size') }}"
                                />
                                @error('size')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="month">Select Month:</label>
                            <div class="col-md-6">
                                <select id="month" name="month" class="select select-bordered">
                                    <option>January</option>
                                    <option>February</option>
                                    <option>March</option>
                                    <option>April</option>
                                    <option>May</option>
                                    <option>June</option>
                                    <option>July</option>
                                    <option>August</option>
                                    <option>September</option>
                                    <option>October</option>
                                    <option>November</option>
                                    <option>December</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="year">Select Year:</label>
                            <div class="col-md-6">
                                <select id="year" name="year" class="select select-bordered">
                                    <option>2024</option>
                                    <option>2025</option>
                                    <option>2026</option>
                                    <option>2027</option>
                                    <option>2028</option>
                                    <option>2029</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="image">Select Image</label>
                            <input type="file" name="image" id="image" class="form-control" required />
                        </div>

                        <div class="row mb-3">
                            <label for="framed" class="col-md-4 col-form-label text-md-end text-start">Framed</label>
                            <div class="col-md-6">
                                <input
                                    type="text"
                                    class="form-control @error('framed') is-invalid @enderror"
                                    id="framed"
                                    name="framed"
                                    value="{{ old('framed', 'Matted') }}"
                                />
                                @error('sku')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mt-2">Upload</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>
