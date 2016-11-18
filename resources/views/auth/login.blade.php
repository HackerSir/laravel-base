@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <div class="card">
        <div class="card-header">
            Login
        </div>
        <div class="card-block">
            <form role="form" method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}

                <div class="form-group row{{ $errors->has('email') ? ' has-danger' : '' }}">
                    <label for="email" class="col-md-4 form-control-label">E-Mail Address</label>

                    <div class="col-md-6">
                        <input id="email" type="email"
                               class="form-control{{ $errors->has('email') ? ' form-control-danger' : '' }}"
                               name="email"
                               value="{{ old('email') }}" required autofocus>

                        @if ($errors->has('email'))
                            <span class="form-control-feedback">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row{{ $errors->has('password') ? ' has-danger' : '' }}">
                    <label for="password" class="col-md-4 form-control-label">Password</label>

                    <div class="col-md-6">
                        <input id="password" type="password"
                               class="form-control{{ $errors->has('password') ? ' form-control-danger' : '' }}"
                               name="password" required>

                        @if ($errors->has('password'))
                            <span class="form-control-feedback">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-6 offset-md-4">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="remember"> Remember Me
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            Login
                        </button>

                        <a class="btn btn-link" href="{{ route('password.reset') }}">
                            Forgot Your Password?
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
