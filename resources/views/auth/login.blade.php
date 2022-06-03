@extends('layouts.app')
@section('styles')
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">
@endsection

@section('fullpage')

<div class="container">
  <div class="forms-container">
    <div class="signin-signup">
      <form method="POST" action="{{ route('login', app()->getLocale()) }}" class="sign-in-form">
        @csrf
        <h2 class="title">{{__('Sign in')}}</h2>
        <div class="input-field">
          <i class="fa fa-user" aria-hidden="true"></i>
          {{-- <input type="text" placeholder="Username" /> --}}
          <input id="email" placeholder="User Email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
          @error('email')
            <span class="has-text-danger" role="alert">
                <strong class="has-text-danger">{{ $message }}</strong>
            </span>
          @enderror
        </div>
        <div class="input-field">
          <i class="fa fa-lock"></i>
          <input id="password" placeholder="Password" type="password" class=" @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
    
          @error('password')
              <span class="invalid-feedback" role="alert">
                  <strong class="has-text-danger">{{ $message }}</strong>
              </span>
          @enderror
        </div>
        <button type="submit" class="btn solid">
          {{ __('Login') }}
      </button>
      <p class="control is-expanded is-pulled-left">
        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

        <label class="form-check-label" for="remember">
            {{ __('Remember Me') }}
        </label>
      </p>
      <p class="social-text">
        @if (Route::has('password.request'))
          <a class="social-text" href="{{ route('password.request', app()->getLocale()) }}">
              {{ __('Forgot Your Password?') }}
          </a>
        @endif
      </p>
        {{-- <div class="social-media">
          <a href="#" class="social-icon">
            <i class="fa fa-facebook-f"></i>
          </a>
          <a href="#" class="social-icon">
            <i class="fa fa-twitter"></i>
          </a>
          <a href="#" class="social-icon">
            <i class="fa fa-google"></i>
          </a>
          <a href="#" class="social-icon">
            <i class="fa fa-linkedin-in"></i>
          </a>
        </div> --}}
      </form>
      <form method="POST" action="{{ route('register', app()->getLocale()) }}" class="sign-up-form">
        @csrf
        <h2 class="title">{{__('Sign up')}}</h2>
        <div class="input-field">
          <i class="fa fa-user"></i>
          <input id="name" placeholder="name" type="text" class="@error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
    
          @error('name')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
        </div>
        <div class="input-field">
          <i class="fa fa-envelope"></i>
          <input id="email" placeholder="email" type="email" class=" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
    
          @error('email')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
        </div>
        <div class="input-field">
          <i class="fa fa-lock"></i>
          <input id="password" placeholder="password" type="password" class="input @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
    
          @error('password')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
        </div>
        <div class="input-field">
          <i class="fa fa-lock"></i>
          <input id="password-confirm" placeholder="Confirm Password" type="password" class="input" name="password_confirmation" required autocomplete="new-password">
        </div>
        <button type="submit" class="btn">
          {{ __('Sign up') }}
        </button>
        {{-- <input type="submit" class="btn" value="Sign up" /> --}}
        {{-- <p class="social-text">Or Sign up with social platforms</p>
        <div class="social-media">
          <a href="#" class="social-icon">
            <i class="fa fa-facebook-f"></i>
          </a>
          <a href="#" class="social-icon">
            <i class="fa fa-twitter"></i>
          </a>
          <a href="#" class="social-icon">
            <i class="fa fa-google"></i>
          </a>
          <a href="#" class="social-icon">
            <i class="fa fa-linkedin-in"></i>
          </a>
        </div> --}}
      </form>
    </div>
  </div>
  <div class="featureContainer" style="height:100px; position: absolute; top:50%; left:5%; z-index:9">
    
  </div>
  <div class="panels-container">
    <div class="panel left-panel">
      <div class="content">
        <h3>New here ?</h3>
        <p>
          Lorem ipsum, dolor sit amet consectetur adipisicing elit. Debitis,
          ex ratione. Aliquid!
        </p>
        
        <button class="btn transparent" id="sign-up-btn">
          Sign up
        </button>
     
        <page-slide></page-slide>

      </div>
      <img src="/images/log.svg" class="image" alt="" />
    </div>
    <div class="panel right-panel">
      <div class="content">
        <h3>One of us ?</h3>
        <p>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum
          laboriosam ad deleniti.
        </p>
        <button class="btn transparent" id="sign-in-btn">
          Sign in
        </button>
      </div>
      <img src="/images/register.svg" class="image" alt="" />
    </div>
  </div>
  
</div>

@endsection
@section('scripts')
  <script src="{{ asset('js/login-app.js') }}"></script>
  <script>


    var vm = new Vue({
     el: '#app',
     // components: { 'side-nav': sideNav }
     
 }); 
@endsection
