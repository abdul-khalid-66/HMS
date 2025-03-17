
@extends('layouts.app')

@section('content')
    <div class="container-fluid">

      <div class="lock-container">
        <div class="panel panel-default text-center paper-shadow" data-z="0.5">
          <h1 class="text-display-1 text-center margin-bottom-none">Sign In</h1>
          <div class="panel-body">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                <div class="form-control-material">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    <label for="username">Username</label>
                </div>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                <div class="form-control-material">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    <label for="password">Password</label>
                </div>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">
                    {{ __('Login') }}<i class="fa fa-fw fa-unlock-alt"></i>
                </button>
            {{-- <a href="website-student-dashboard.html" class="btn btn-primary">Login </a> --}}
        </form>
            @if (Route::has('password.request'))
                <a class="forgot-password" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            @endif
            @if (Route::has('register'))
                    <a class="link-text-color" href="{{ route('register') }}">{{ __('Create account') }}</a>
            @endif
          </div>
        </div>
      </div>

    </div>
@endsection 