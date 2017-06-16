@extends('layouts.app')

@section('title', 'Register')

@section('content')
    <div class="card">
        <div class="card-header">
            Register
        </div>
        <div class="card-block">
            <form role="form" method="POST" action="{{ route('register') }}">
                {{ csrf_field() }}

                <div class="form-group row{{ $errors->has('name') ? ' has-danger' : '' }}">
                    <label for="name" class="col-md-4 form-control-label">Name</label>

                    <div class="col-md-6">
                        <input id="name" type="text"
                               class="form-control{{ $errors->has('name') ? ' form-control-danger' : '' }}" name="name"
                               value="{{ old('name') }}" required
                               autofocus>

                        @if ($errors->has('name'))
                            <span class="form-control-feedback">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row{{ $errors->has('email') ? ' has-danger' : '' }}">
                    <label for="email" class="col-md-4 form-control-label">E-Mail Address</label>

                    <div class="col-md-6">
                        <input id="email" type="email"
                               class="form-control{{ $errors->has('email') ? ' form-control-danger' : '' }}"
                               name="email" value="{{ old('email') }}"
                               required>

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
                    <label for="password-confirm" class="col-md-4 form-control-label">Confirm Password</label>

                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                               required>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            Register
                        </button>
                        <a class="btn btn-link" href="{{ route('login') }}">
                            Login
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
