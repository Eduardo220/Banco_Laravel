@if (session('success'))
    <p style="color: green;">
        {{ session('success') }}
    </p>
@endif