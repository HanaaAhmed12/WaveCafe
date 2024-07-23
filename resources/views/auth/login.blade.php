
@extends('layouts.app')

@section('content')
<div class="login_wrapper">
<div id="signin" class="animate form login_form" >
        <section class="login_content">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <h1>Login Form</h1>
                <div>
                    <input id="userName" type="text" class="form-control @error('userName') is-invalid @enderror" name="userName" value="{{ old('userName') }}" required autocomplete="userName" placeholder="Username" autofocus>
                    @error('userName')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div>
                    <button type="submit" class="btn btn-default submit">{{ __('Login') }}</button>
                    @if (Route::has('password.request'))
                        <a class="reset_pass" href="{{ route('password.request') }}">Lost your password?</a>
                    @endif
                </div>
                <div class="clearfix"></div>
                <div class="separator">
                    <p class="change_link">New to site?
                        <a href="{{ route('register') }}" class="to_register"> Create Account </a>
                    </p>
                    <div class="clearfix"></div>
                    <br />
                    <div>
                        <h1><i class="fa fa-graduation-cap"></i> Beverages Admin</h1>
                        <p>©2016 All Rights Reserved. Beverages Admin is a Bootstrap 4 template. Privacy and Terms</p>
                    </div>
                </div>
            </form>
        </section>
    </div>
</div>
@endsection
