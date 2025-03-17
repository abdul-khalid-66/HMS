@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="">
        <div class="panel panel-default text-center paper-shadow" data-z="0.5">
            <h1 class="text-display-1 text-center margin-bottom-none">Enrollment Form</h1>
            <div class="panel-body">
                <form method="POST" action="{{ route('enroll.store') }}">
                    @csrf
                    <div class="form-group">
                        <div class="form-control-material">
                            <input id="fullname" type="text" class="form-control @error('fullname') is-invalid @enderror"
                                name="fullname" value="{{ old('fullname') }}" required autocomplete="fullname" autofocus>
                            <label for="userfullname">Full Name</label>
                        </div>
                        @error('fullname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <div class="form-control-material">
                            <input id="schoolname" type="text" class="form-control @error('schoolname') is-invalid @enderror"
                                name="schoolname" value="{{ old('schoolname') }}" required autocomplete="schoolname" autofocus>
                            <label for="username">School Name</label>
                        </div>

                        @error('schoolname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <div class="form-control-material">
                            <input id="domain" type="domain" class="form-control @error('domain') is-invalid @enderror"
                                name="domain" value="{{ old('domain') }}" required autocomplete="domain" autofocus>
                            <label for="username">School Domain</label>
                            <small class="text-muted">Example: school1.yourschool.com</small>
                        </div>
                        @error('domain')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <div class="form-control-material">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            <label for="username">Email</label>
                        </div>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <div class="form-control-material">
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="current-password">
                            <label for="password">Password</label>
                        </div>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <div class="form-control-material">
                          <input id="passwordConfirmation" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password"
                            placeholder="Password Confirmation">
                          <label for="passwordConfirmation">Re-type password</label>
                        </div>
                      </div>
                    <button type="submit" class="btn btn-primary">
                        {{ __('Enroll Now') }}<i class="fa fa-fw fa-unlock-alt"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection