@extends('layouts.app')

@section('content')
    <div class="container-scroller">
        <div class="container-fluid">
            <div class="row">
                <div class="content-wrapper full-page-wrapper d-flex align-items-center auth-pages">
                    <div class="card col-lg-4 mx-auto">
                        <div class="card-body px-5 py-5">
                            <h3 class="card-title text-center mb-3">SIMIK Admin Login</h3>
                            @if (session('status'))
                                <div class="alert alert-danger">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <form class="form-horizontal" method="POST" action="{{ route('admin.submit.login') }}">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <input type="text" name="email" class="form-control p_input {{ $errors->has('email') ? ' has-error' : '' }}" placeholder="Email" value="{{ old('email') }}">
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                                    <input type="password" name="password" class="form-control p_input" placeholder="Password">
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group d-flex align-items-center justify-content-between">
                                    <div class="form-check"><label><input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}class="form-check-input">Remember me</label></div>
                                    <a href="{{ route('admin.password.request') }}" class="forgot-pass">Forgot password</a>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary btn-block enter-btn">LOG IN</button>
                                </div>
                                <!--<p class="Or-login-with my-3">Or login with</p>
                                <a href="#" class="facebook-login btn btn-facebook btn-block">Sign in with Facebook</a>
                                <a href="#" class="google-login btn btn-google btn-block">Sign in with Google+</a>-->
                                <a href="{{ route('register') }}" class="google-login btn btn-create-account btn-block">Create An Account</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
