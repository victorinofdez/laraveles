@extends('layouts.app')

@section('content')
<div class="container">
    <div class="table-responsive">
        <h1>Datos del usuario</h1>
        <table class="table table-hover table-borderless ">
                <thead>
                    <tr class="table-dark">
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">email</th>
                        <th scope="col">Rol</th>
                        <th scope="col">Email verified</th>
                    </tr>
                </thead>
                <tbody>
                     <tr class="table-primary">
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->type}}</td>
                        <td>{{$menssage}}</td>
                    </tr>
                </tbody>
                
        </table>
    </div>
    <div class="d-flex mt-2 w-100">
        <a class="me-auto p2 btn-success btn" href="{{ url('admin') }}">Back</a>
        <a class="p2 btn-warning btn " href="{{ url('admin/' . $user->id .'/edit') }}">Edit</a> 
          <!--La ruta del edit funciona pero el delete como no se como lo van a hacer lo dejo con la ruta al index-->
          
        <form data-user="{{ $user->name . ' con email ' . $user->email }}" class="formDelete" action="{{ url('admin/' . $user->id) }}" method="post" style="display: inline-block">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-warning">link to delete</button>
                              </form>
        
        
        
    </div>
</div>
@endsection