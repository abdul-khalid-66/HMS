{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}


{{-- <!DOCTYPE html>
<html class="hide-sidebar ls-bottom-footer" lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Learning</title>

  <link href="{{ asset('website/css/vendor/all.css') }}" rel="stylesheet">
  <link href="{{ asset('website/css/app/app.css') }}" rel="stylesheet">

</head>

<body class="login">

  <div id="content"> --}}
    @extends('layouts.app')

@section('content')
<div class="container-fluid">

  <div class="lock-container">
    <div class="panel panel-default text-center paper-shadow" data-z="0.5">
      <h1 class="text-display-1">Create account</h1>
      <div class="panel-body">

        <!-- Signup -->
        <form method="POST" action="{{ route('register') }}">
            @csrf
          <div class="form-group">
            <div class="form-control-material">
              <input id="firstName" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" placeholder="First Name">
              <label for="firstName">First name</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-control-material">
              <input id="lastName" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" placeholder="Last Name">
              <label for="lastName">Last name</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-control-material">
              <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email">
              <label for="email">Email address</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-control-material">
              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" placeholder="Password">
              <label for="password">Password</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-control-material">
              <input id="passwordConfirmation" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password"
                placeholder="Password Confirmation">
              <label for="passwordConfirmation">Re-type password</label>
            </div>
          </div>
          <div class="form-group text-center">
          <div class="text-center">
            <button type="submit" class="btn btn-primary">
                {{ __('Register') }}
            </button>
          </div>
        </form>
        <!-- //Signup -->

      </div>
    </div>
  </div>

</div>

@endsection
   
  {{-- </div>

  <script>
    var colors = {
      "danger-color": "#e74c3c",
      "success-color": "#81b53e",
      "warning-color": "#f0ad4e",
      "inverse-color": "#2c3e50",
      "info-color": "#2d7cb5",
      "default-color": "#6e7882",
      "default-light-color": "#cfd9db",
      "purple-color": "#9D8AC7",
      "mustard-color": "#d4d171",
      "lightred-color": "#e15258",
      "body-bg": "#f6f6f6"
    };
    var config = {
      theme: "html",
      skins: {
        "default": {
          "primary-color": "#42a5f5"
        }
      }
    };
  </script>

  <script src="{{ asset('website/js/vendor/all.js') }}"></script>

  <script src="{{ asset('website/js/app/app.js') }}"></script>

</body>

</html> --}}