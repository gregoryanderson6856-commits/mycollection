@if (session()->has('success'))
    <div class="- narrow container">
        <div class="alert alert-success text-center">{{ session('success') }}</div>
    </div>
@endif

@if (session()->has('error'))
    <div class="- narrow container">
        <div class="alert alert-danger text-center">{{ session('error') }}</div>
    </div>
@endif
