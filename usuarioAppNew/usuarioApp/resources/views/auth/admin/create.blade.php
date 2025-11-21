@extends('layouts.app')

@section('content')
 <div class="card">
                    <div class="card-body">
                        <div class="border p-3 rounded">
                            <h6 class="mb-0 text-uppercase">Crea usuarios</h6>
                            <hr>
                            <form class="row g-3" method="post" action="{{url('admin')}}" enctype='multipart/form-data'>
                                 @csrf
                                <div class="col-12">
                                    <label class="form-label">Nombre usuario</label>
                                    <input type="text" class="form-control" name="name" value="{{old('name')}}">
                                </div>
                                 <div class="col-12">
                                    <label class="form-label">Email usuario</label>
                                    <input type="text" class="form-control" name="email" value="{{old('email')}}">
                                </div>
                                 <div class="col-12">
                                    <label class="form-label">Contraseña usuario</label>
                                    <input type="password" class="form-control" name="password" value="{{old('password')}}">
                                </div>
                                <div  class="col-12">
                                        <select class="form-select" aria-label="Default select example" name="type">
                                          <option selected hidden>Tipo de usuario</option>
                                          <option value="user">User</option>
                                          <option value="root">Root</option>
                                        </select>
                                </div>
                              

                                <div class="col-1">
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary">Create user</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
@endsection