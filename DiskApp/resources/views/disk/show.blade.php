@extends ('app.base')
@section('title')

@section ('content')
<div class="table-responsive small">
            <table class="table table-striped table-sm">
              
              <tbody>
                  <tr>
                      <td>#</td>
                      <td>{{ $game-> id }}</td>
                  </tr>
                  <tr>
                      <td>Title</td>
                      <td>{{ $game-> title }}</td>
                  </tr>
                  <tr>
                      <td>Director</td>
                      <td>{{ $game-> director }}</td>
                  </tr>
                  <tr>
                      <td>Developer</td>
                      <td>{{ $game-> developer }}</td>
                  </tr>
                  <tr>
                      <td>Relaise</td>
                      <td>{{ $game-> relaise }}</td>
                  </tr>

              </tbody>
              
            </table>
            <a class="btn btn-primary" href="{{ url ('game/') }}">Back</a>
            <a class="btn btn-primary" href="{{url('game/' . $game->id . '/edit')}}">Edit</a>
          </div> 
@endsection