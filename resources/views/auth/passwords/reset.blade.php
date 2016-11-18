@extends('layouts.app')

@section('title', 'Reset Password')

@section('content')
    <div class="card">
        <div class="card-header">
            Reset Password
        </div>
        <div class="card-block">
            <form role="form" method="POST" action="{{ route('password.reset') }}">
                {{ csrf_field() }}

                <input type="hidden" name="token" value="{{ $token }}">

                <div class="form-group row{{ $errors->has('email') ? ' has-danger' : '' }}">
                    <label for="email" class="col-md-4 form-control-label">E-Mail Address</label>

                    <div class="col-md-6">
                        <input id="email" type="email"
                               class="form-control{{ $errors->has('email') ? ' form-control-danger' : '' }}"
                               name="email"
                               value="{{ $email or old('email') }}" required autofocus>

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
                               class="form-control{{ $errors->has('email') ? ' form-control-danger' : '' }}"
                               name="password" required>

                        @if ($errors->has('password'))
                            <span class="form-control-feedback">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row{{ $errors->has('password_confirmation') ? ' has-danger' : '' }}">
                    <label for="password-confirm" class="col-md-4 form-control-label">Confirm Password</label>
                    <div class="col-md-6">
                        <input id="password-confirm" type="password"
                               class="form-control{{ $errors->has('email') ? ' form-control-danger' : '' }}"
                               name="password_confirmation"
                               required>

                        @if ($errors->has('password_confirmation'))
                            <span class="form-control-feedback">
                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            Reset Password
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
