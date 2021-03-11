@extends('layouts.auth')
@section('head_title', 'Login')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-offset-4 col-md-4">
            <h4 class="text-center">Praxxy Practical Exam</h4>
            <form method="POST" action="{{ route('login') }}" id="login">
                @csrf
                <div class="form-group has-feedback" style="margin-bottom: 10px;">
                    <input id="login" type="text"
                        class="form-control{{ $errors->has('username') || $errors->has('email') ? ' is-invalid' : '' }}"
                        name="login" value="{{ old('username') ?: old('email') }}" required autofocus placeholder="Email / Username">
                    @if ($errors->has('username') || $errors->has('email'))
                        <span class="text-danger">
                            <strong>{{ $errors->first('username') ?: $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback" style="margin-bottom: 10px;">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" value="{{ old('password') }}" required>
                    @error('password')
                        <span class="text-danger">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group row">
                    <div class="col-md-6 offset-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-success btn-block sign-in">
                            <i class="loading fa"></i>
                            Sign In
                        </button>
                    </div>
                </div>

                @if(session()->has('custom_error_message'))
                    <div id="roll" class="alert alert-danger alert-dismissible" style="margin-top: 10px;">
                        {!! Session::get('custom_error_message') !!}
                    </div>
                    <br>
                @endif
            </form>
        </div>
    </div>
</div>
@endsection
