@extends('app.base')
@section('title', 'Settings')

@section('content')
<form action="{{url('setting')}}" method="post">
  
  @method('put')
  @csrf
  <br>
  <div>
    Behaviour after inserting new game
  </div>
   <br>
  <input  class="form-check-input" type="radio" id="showGame" name="afterInsert" value="showGames" {{ $checkedList }}/>
  <label class="form-check-label" for="showGame" >
    Show all games list
  </label>
  <br>
  <input  class="form-check-input" type="radio" id="createGame" name="afterInsert" value="show create form" {{ $checkedCreate }}/>
  <label class"form-check-label" for="createGame">
    Show create new game form
  </label>
   <br>
  <br>
  <button type="submit" class="btn btn-primary">Save setting</button>
  
</form>

@endsection