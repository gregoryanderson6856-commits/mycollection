@if (session()->has('success'))
    <div class="mb-5 items-center">
        <div class="alert alert-success text-center">{{ session('success') }}</div>
    </div>
@endif

@if (session()->has('error'))
    <div class="mb-5">
        <div class="alert alert-danger text-center">{{ session('error') }}</div>
    </div>
@endif
