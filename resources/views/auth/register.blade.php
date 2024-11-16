@extends('layouts.app')

@section('content')
<br>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-5 col-md-8">
            <form method="POST" action="{{ route('register') }}" class="bg-white rounded shadow-5-strong p-5">
              @csrf

              <!-- Name input -->
              <div class="form-outline mb-4" data-mdb-input-init>
                <input type="text" id="form1Example1" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autofocus />
                <label class="form-label" for="form1Example1">Full Name</label>
                @error('name')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              <!-- Email input -->
              <div class="form-outline mb-4" data-mdb-input-init>
                <input type="email" id="form1Example2" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required />
                <label class="form-label" for="form1Example2">Email address</label>
                @error('email')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              <!-- Password input -->
              <div class="form-outline mb-4" data-mdb-input-init>
                <input type="password" id="form1Example3" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" />
                <label class="form-label" for="form1Example3">Password</label>
                @error('password')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              <!-- Confirm Password input -->
              <div class="form-outline mb-4" data-mdb-input-init>
                <input type="password" id="form1Example4" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" required autocomplete="new-password" />
                <label class="form-label" for="form1Example4">Confirm Password</label>
                @error('password_confirmation')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              <!-- Submit button -->
              <button type="submit" class="btn btn-primary btn-block" data-mdb-ripple-init>Register</button>

              <div class="mt-4 text-center">
                <a href="{{ route('login') }}" class="text-sm text-gray-600 hover:text-gray-900">Already registered?</a>
              </div>
            </form>
          </div>
        </div>
      </div>
<br>
@endsection
