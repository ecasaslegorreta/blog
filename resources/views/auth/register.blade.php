@extends('theme.backoffice.layouts.admin')

@section('title','La Jordana')
    
@section('head')
  
    
@endsection

@section('header')
<link href="{{ asset('css/register.css') }}" rel="stylesheet">
@endsection

@section('container')
<body>
  <div class="container">
    <div class="row">
      <div class="col-lg-10 col-xl-9 mx-auto">
        <div class="card card-signin flex-row my-5">
          <div class="card-img-left d-none d-md-flex">
             <!-- Background image for card set in CSS! -->
          </div>
          <div class="card-body">
            <h5 class="card-title text-center">Registro</h5>

            <form method="POST" action="{{ route('register') }}">
                        @csrf

              <div class="form-label-group">
                <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" placeholder="Username" required autofocus>
                <label for="name">Username</label>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>

              <div class="form-label-group">
                <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email address" required autocomplete="email">
                <label for="inputEmail">Email address</label>
              </div>

              <hr>


              <div class="form-label-group">
                <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="new-password">
                <label for="password">Password</label>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              


              <div class="form-label-group">
                <input type="password" id="password-confirm" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Password" required>
                <label for="password-confirm">Confirm password</label>
              </div>





              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Register</button>
            <a class="d-block text-center mt-2 small" href="{{ route('login') }}">Sign In</a>
                <hr class="my-4">
              <button class="btn btn-lg btn-google btn-block text-uppercase" type="submit"><i class="fab fa-google mr-2"></i> Sign up with Google</button>
              <button class="btn btn-lg btn-facebook btn-block text-uppercase" type="submit"><i class="fab fa-facebook-f mr-2"></i> Sign up with Facebook</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

@endsection

@section('foot')

@endsection