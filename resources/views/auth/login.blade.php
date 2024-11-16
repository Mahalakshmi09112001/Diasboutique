@extends('layouts.app')

@section('content')
<br>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-5 col-md-8">
            <form method="POST" action="{{ route('login') }}" class="bg-white rounded shadow-5-strong p-5">
              @csrf

              <!-- Email input -->
              <div class="form-outline mb-4" data-mdb-input-init>
                <input type="email" id="form1Example1" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autofocus />
                <label class="form-label" for="form1Example1">Email address</label>
                @error('email')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              <!-- Password input -->
              <div class="form-outline mb-4" data-mdb-input-init>
                <input type="password" id="form1Example2" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" />
                <label class="form-label" for="form1Example2">Password</label>
                @error('password')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              <!-- 2 column grid layout for inline styling -->
              <div class="row mb-4">
                <div class="col d-flex justify-content-center">
                  <!-- Remember me -->
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="form1Example3" name="remember" {{ old('remember') ? 'checked' : '' }} />
                    <label class="form-check-label" for="form1Example3">
                      Remember me
                    </label>
                  </div>
                </div>

                <div class="col text-center">
                  <!-- Simple link -->
                  @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">Forgot password?</a>
                  @endif
                </div>
              </div>

              <!-- Submit button -->
              <button type="submit" class="btn btn-primary btn-block" data-mdb-ripple-init>Sign in</button>
            </form>
          </div>
        </div>
      </div>
    <br>
@endsection
