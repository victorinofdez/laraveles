@extends('app.base')

@section('title', 'Argo Create Disk')

@section('content')
<form action="{{ url('disk') }}" method="post" enctype="multipart/form-data">

    <!-- Solución de error por CSRF -->
    <!--<input type="hidden" name="_method" value="post">-->
    <!--<input type="hidden" name="_token" value="{{ csrf_token() }}">-->
    @csrf

    <!-- Inputs del formulario -->

    <div class="mb-3">

        <label for="title" class="form-label">Disk title</label>

        <input type="text" class="form-control" id="title" name="title" required  value="{{ old('title') }}">

    </div>

    <div class="mb-3">

        <label for="idartist" class="form-label">Disk artist</label>

        <!--<input type="text" class="form-control" id="idartist" name="idartist" required value="{{ old('idartist') }}">-->
        <!--
        <select name="idartist" id="idartist" class="form-select">
            <option disabled value="" selected>Select the artist</option>
            @foreach ($artists as $value => $label)
                <option value="{{ $value }}" {{ $idartist == $value ? 'selected' : '' }}>{{ $label }}</option>
            @endforeach
        </select>
        -->
        <input type="hidden" name="idartist" value="{{ $idartist }}">
        <h1>{{ $artist->name }}</h1>
    </div>

    <div class="mb-3">

        <label for="year" class="form-label">Movie year</label>

        <input type="number" class="form-control" id="year" name="year" step="1" min="1" max="9999" value="{{ old('year') }}">

    </div>

    <div class="mb-3">

        <label for="cover" class="form-label">Disk cover</label>

        <input type="file" class="form-control" id="cover" name="file" value="{{ old('cover') }}">

    </div>
    
    <button type="submit" class="btn btn-success">Add</button>
    <a href="{{ url('disk') }}" class="btn btn-dark">Back</a>

</form>
@endsection