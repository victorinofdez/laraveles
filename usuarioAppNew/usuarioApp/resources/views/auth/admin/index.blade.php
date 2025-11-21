@extends('layouts.app')

@section('content')
        
    <div class="container mt-4">
        <div class="table-responsive">
            <a class="btn btn-primary" href="{{ url ('/') }}">Back</a>
            <a class="btn btn-success" href="{{ url ('admin/create') }}">Create user</a>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Type</th>
                        <th scope="col">Verified</th>
                        <th scope="col">View</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->type }}</td>
                            <td>{{ $user->email_verified_at }}</td>
                            <td>
                                <a class="btn btn-primary" href="{{ url('admin/' . $user->id) }}">Link to view</a>
                            </td>
                            <td>
                                <a class="btn btn-warning" href="{{ url('admin/' . $user->id.'/edit') }}">Link to edit
                                </a>
                            </td>
                            <td>
                              <form data-user="{{ $user->name . ' con email ' . $user->email }}" class="formDelete" action="{{ url('admin/' . $user->id) }}" method="post" style="display: inline-block">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-warning">link to delete</button>
                              </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
