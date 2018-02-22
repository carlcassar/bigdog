{{-- Validation Messages --}}
@if ($errors->any())
    <div class="alert alert-danger">
        <h3>Oops, something doesn't check out.</h3>
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@elseif(session()->has('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div id="ajax-messages"></div>
