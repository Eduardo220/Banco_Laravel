@if (session('success'))
    <p style="color: green;">
        {{ session('success') }}
    </p>
@endif

@if (session('error'))
    <p style="color: red;">
        {{ session('error') }}
    </p>
@endif

@if ($errors->any())
    <p style="color: red;">
        @foreach ($errors->all() as $error)
            {{ $error }}<br>
        @endforeach
    </p>
@endif
