@extends('app.base')

@section('title', 'Argo Disk List')

@section('content')
<img src="{{  url('https://tfuecru2003.ieszaidinvergeles.es/DWES/laraveles/argoApp/public/disk/view/file/fotosubida.jpg') }}">

<div class="table-responsive small">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">title</th>
          <th scope="col">idartist</th>
          <th scope="col">year</th>
          <th scope="col">cover</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @foreach($disks as $disk)
            <tr>
                <td>{{ $disk->id }}</td>
                <td>{{ $disk->title }}</td>
                <td>{{ $disk->idartist }} {{ $disk->artist->name }}</td>
                <td>{{ $disk->year }}</td>
                <td>
                    @if($disk->cover !=null)
                      <img src="data:image/jpeg;base64, {{ $disk->cover }}">
                    @endif
                </td>
            </tr>
        @endforeach
      </tbody>
    </table>
    <a class="btn-info btn" href="{{ url('disk/create') }}">Add (no sense anymore)</a>
</div>
@endsection