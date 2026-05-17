@extends('layouts.admin')
@section('content')
<div class="container d-flex align-items-center justify-content-center min-vh-100">
  <div class="card " style="max-width:420px; width:100%;">
    <div class="card-body p-5">
      <div class="text-center mb-3">
      <a href="{{ route('home') }}" class="mb-4 d-inline-block"><img src="{{ asset('assets/admin/images/logo-icon.svg') }}" alt="" width="36">
      <span class=" ms-2"> <img src="{{ asset('assets/admin/images/logo.svg') }}" alt=""></span>
      </a>
        <h1 class="card-title mb-5 h5">Sign in to your account</h1>

      </div>

      <form action="{{ route('login') }}" method="POST" class="needs-validation mt-3">
        @csrf
        <div class="mb-3">
          <label for="email" class="form-label">Email address</label>
          <input id="email" name="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="name@example.com" required autofocus value="{{ old('email') }}">
          @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3">
          <label for="password" class="form-label d-flex justify-content-between">
            <span>Password</span>
          </label>
          <input id="password" name="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" required>
          @error('password')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="d-flex justify-content-between align-items-center mb-3">
          <div class="form-check">
            <input id="remember" name="remember" class="form-check-input" type="checkbox">
            <label class="form-check-label small" for="remember">Remember me</label>
          </div>
        </div>

        <button class="btn btn-primary w-100" type="submit">Sign in</button>
      </form>

      <div class="text-center mt-3 small text-muted">
        <a href="{{ route('home') }}" class="link-primary">Back to Home</a>
      </div>
    </div>
  </div>
</div>
@endsection