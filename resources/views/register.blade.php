@extends('layouts.main')

@section('title', 'Form Register')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-4">
                <div class="card mt-5">
                    <div class="card-header">
                        <strong class="text-center d-block">
                            Form <span class="text-primary">Register</span>
                        </strong>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('user.register') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="name" name="name" value="{{ old('name') }}" autocomplete="off" autofocus
                                    required>
                                @error('name')
                                    <div id="name" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    id="email" name="email" value="{{ old('email') }}" autocomplete="off" required>
                                @error('email')
                                    <div id="email" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    id="password" name="password" autocomplete="off" required>
                                @error('password')
                                    <div id="password" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Register</button>
                            <small class="text-center d-block mt-1">
                                Sudah memiliki akun?
                                <a href="{{ route('view.login') }}">Login</a>
                            </small>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
