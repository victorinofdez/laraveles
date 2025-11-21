@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(session('message'))
                  <div class="alert alert-success" role="alert">
                      {{  session('message') }}
                  </div>
            @endif()
            <div class="card">
                <div class="card-header">{{ __('Profile') }}</div>

                <div class="card-body">
                    <form method="post" action="{{ url('user/update') }}">
                        @method('put')
                        @csrf
                        <label for="name">
                            Name
                            @error('name')
                                <small>{{$message}}</small>
                            @enderror
                        </label>
                        <input required type="text" id="name" name="name" class="form-control mt-2" value="{{ old('name', $user->name) }}">
                        
                        <label for="name" class="mt-2">
                            Email
                            @error('email')
                                <small>{{$message}}</small>
                            @enderror
                        </label>
                        <input required type="text" id="email" name="email" class="form-control mt-2" value="{{ old('email', $user->email) }}">
                         @error('name')
                            <small>{{$message}}</small>
                         @enderror
                        <input type="submit" class="btn btn-success mt-2" value="Edit">
                    </form>
                    
                    
                    <form method="post" action="{{ url('user/password') }}">
                        @method('put')
                        @csrf
                         <label for="oldpassword">
                            Current password
                            @error('oldpassword')
                                <small>{{$message}}</small>
                            @enderror
                        </label>
                        <input required type="password" id="oldpassword" name="oldpassword" class="form-control mt-2" value="">
                        
                        <label for="password">
                            New password
                            @error('password')
                                <small>{{$message}}</small>
                            @enderror
                        </label>
                        <input required type="password" id="password" name="password" class="form-control mt-2" value="">
                        
                         <label for="password_confirmation">
                            Repeat new password
                            @error('password_confirmation')
                                <small>{{$message}}</small>
                            @enderror
                        </label>
                        <input required type="password" id="password_confirmation" name="password_confirmation" class="form-control mt-2" value="">
                        
                        <input type="submit" class="btn btn-success mt-2" value="Change password">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
