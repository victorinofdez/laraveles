@extends('app.base')

@section('title', 'Argo Artist List')

@section('content')

<div>
  <form>
    <select name="rowsPerPage" id="">
    <option value="3">3</option>
    <option value="10">10</option>
    <option value="25">25</option>
    <option value="50">50</option>
    <option value="100">100</option>
  </select>
    <button type="submit">view</button>
  </form>
</div>

<div class="table-responsive small">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">name</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @foreach($artists as $artist)
            <tr>
                <td>{{ $artist->id }}</td>
                <td>{{ $artist->name }}</td>
                <td>
                    @foreach($artist->disks as $disk)
                        {{ $disk->title }},
                    @endforeach
                </td>
                <td>
                  <a class="btn btn-primary" href="{{ url('artist/' . $artist->id) }}">Show</a>
                </td>
            </tr>
        @endforeach
      </tbody>
    </table>
</div>
@endsection