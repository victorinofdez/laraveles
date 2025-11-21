@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-uppercase">{{ __('Edit user "' . $user->name . '"') }}</div>
                <div class="card-body">
                    <form method="post" action="{{ url('admin/'. $user->id) }}">
                        @method('put')
                        @csrf
                        <h5 class="text-uppercase mb-3">Modify profile</h5>
                        <div class="mb-3">
                            <label for="name" class="form-label">Username</label>
                            <input id="name" class="form-control" type="text" name="name" maxlength="255" 
                                value="{{ old('name', $user->name) }}" placeholder="Your name">
                            @error('name')
                                <p style="color: #c62828; font-size: .9rem">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input id="email" class="form-control" type="email" name="email" maxlength="255" 
                                value="{{ old('email', $user->email) }}" placeholder="Your email">
                            @error('email')
                                <p style="color: #c62828; font-size: .9rem">{{ $message }}</p>
                            @enderror
                        </div>
                        @if($user->type != 'root' && $user->id != auth()->id())
                            <div class="mb-3">
                                <label for="type" class="form-label">User type</label>
                                <select class="form-select" id="type" name="type" id="type">
                                    @foreach ($typeOptions as $value => $label)
                                        <option value="{{ $value }}" {{ $user->type === $value ? 'selected' : '' }}>{{ $label }}</option>
                                    @endforeach
                                </select>
                                @error('type')
                                    <p style="color: #c62828; font-size: .9rem">{{ $message }}</p>
                                @enderror
                            </div>
                        @endif
                        <h5 class="text-uppercase mt-5 mb-3">Change password</h5>
                        <div class="mb-4">
                            <label class="form-label" for="password">New password</label>
                            <input id="password" class="form-control" type="text" maxlength="255" minlength="8" name="password">
                            @error('password')
                                <p style="color: #c62828; font-size: .9rem">{{ $message }}</p>
                            @enderror
                        </div>
                        @if(session('message'))
                            <div class="alert alert-success" role="alert">
                                {{ session('message') }}
                            </div>
                        @endif
                        @error('error')
                        <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                        <input class="btn btn-success" type="submit" value="Modify profile"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection