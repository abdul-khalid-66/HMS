@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create New School</h1>
    <form action="{{ route('tenants.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">School Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="domain">School Domain</label>
            <input type="text" name="domain" id="domain" class="form-control" required>
            <small class="text-muted">Example: school1.yourschool.com</small>
        </div>
        <button type="submit" class="btn btn-primary">Create School</button>
    </form>
</div>
@endsection
