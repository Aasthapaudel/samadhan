@extends('app')
@section('content')
<main class="signup-form">
<div class="container">
<div class="row justify-content-center">
<div class="col-md-4">
<div class="card">
<h3 class="card-header text-center">Register User</h3>
<div class="card-body">
<form action="{{ route('register.custom') }}" method="POST">
@csrf
<div class="form-group mb-3">
<input type="text" placeholder="Name" id="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autofocus>
@error('name')
<span class="invalid-feedback" role="alert">
<strong>{{ $message }}</strong>
</span>
@enderror
</div>
<div class="form-group mb-3">
<input type="text" placeholder="Email" id="email_address" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autofocus>
@error('email')
<span class="invalid-feedback" role="alert">
<strong>{{ $message }}</strong>
</span>
@enderror
</div>
<div class="form-group mb-3">
<input type="password" placeholder="Password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" required>
@error('password')
<span class="invalid-feedback" role="alert">
<strong>{{ $message }}</strong>
</span>
@enderror
</div>
<div class="form-group mb-3">
<div class="checkbox">
<label><input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me</label>
</div>
</div>
<div class="d-grid mx-auto">
<button type="submit" class="btn btn-dark btn-block">Sign up</button>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
</main>
@endsection