{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}

@extends('layouts.masterlogin')

@section('title-head', 'Login')

@section('content')
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
            <div class="content-body">
            <div class="auth-wrapper auth-v1 px-2">
                <div class="auth-inner py-2">
                    <div class="card mb-0">
                    <div class="card-body">
                        <a href="javascript:void(0);" class="brand-logo my-1">
                            <img src="{{ asset('assets/images/Lambang_Kabupaten_Klungkung.png') }}" width="80" alt="">
                        </a>

                        <h4 class="card-title text-center mb-25">KELURAHAN SEMARAPURA KAJA</h4>
                        <p class="card-text text-center mb-2">KABUPATEN KLUNGKUNG</p>

                        <div class="divider my-2">
                            <div class="divider-text">Silakan Login</div>
                        </div>

                        <form class="auth-login-form mt-2" action="{{route('login')}}" method="POST">
                            {!! csrf_field() !!}
                            <div class="form-group">
                                <label for="email" class="form-label">Username</label>
                                <input type="text" class="form-control" id="email" name="email" aria-describedby="email" tabindex="1" required autofocus>
                                @if ($errors->has('email'))
                                    <span class="text-danger">
                                        <center>{{ $errors->first('email') }}</center>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <div class="d-flex justify-content-between">
                                    <label for="login-password">Password</label>
                                </div>
                                <div class="input-group input-group-merge form-password-toggle">
                                    <input type="password" class="form-control form-control-merge" id="password" name="password" tabindex="2" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                                    </div>
                                </div>
                                @if ($errors->has('password'))
                                    <span class="text-danger">
                                        <center>{{ $errors->first('password') }}</center>
                                    </span>
                                @endif
                            </div>
                            <button class="btn btn-primary btn-block" tabindex="4">Login</button>
                        </form>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

