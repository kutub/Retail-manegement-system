@extends('layouts.app')

@section('fullpage')
<div class="column" style="padding-bottom:0rem">
    <section class="hero login is-fullheight">
        <!-- Hero head: will stick at the top -->
        
        <!-- Hero content: will be in the middle -->
        <div class="hero-body">
          <div class="container has-text-centered">
            <div class="card" style="width: 50%; margin:auto">
                <img class="p-t-30" src="/images/logo/logo.jpg" alt="">
                {{-- <div class="card-header p-t-15 p-l-15 p-b-15">
                    <p class="title" style="color: #333">Login</p>
                </div> --}}
                <div class="card-content">
                    <form method="POST" action="{{ route('login', app()->getLocale()) }}">
                        @csrf
                        <div class="field is-horizontal">
                            <div class="field-label is-normal">
                              <label class="label">{{ __('E-Mail') }}</label>
                            </div>
                            <div class="field-body">
                              <div class="field">
                                <p class="control is-expanded">
                                    <input id="email" placeholder="User Email" type="email" class="input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
    
                                    @error('email')
                                        <span class="has-text-danger" role="alert">
                                            <strong class="has-text-danger">{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </p>
                              </div>
                            </div>
                        </div>
                        
                        <div class="field is-horizontal">
                            <div class="field-label is-normal">
                              <label class="label">{{ __('Password') }}</label>
                            </div>
                            <div class="field-body">
                              <div class="field">
                                <p class="control is-expanded">
                                    <input id="password" placeholder="Password" type="password" class="input @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
    
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong class="has-text-danger">{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </p>
                              </div>
                            </div>
                        </div>
    
                        <div class="field is-horizontal">
                            <div class="field-label is-normal">
                              <label class="label"></label>
                            </div>
                            <div class="field-body">
                              <div class="field">
                                <p class="control is-expanded is-pulled-left">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
    
                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </p>
                              </div>
                            </div>
                        </div>
    
                        <div class="field p-t-15 is-grouped is-grouped-centered">
                            <p class="control is-pulled-left">
                                <button type="submit" class="button is-primary">
                                    {{ __('Login') }}
                                </button>
                            </p>
                            <p class="control p-t-10">
                                @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                            </p>
                        </div>
                        <div class="field p-b-5 is-grouped is-grouped-centered">
                          <p class="control">
                            @if (Route::has('register'))
                              <a href="{{ route('register', app()->getLocale()) }}">Register</a>
                            @endif
                          </p>
                      </div>
                    </form>
                </div>
            </div>
          </div>
        </div>
      
        <!-- Hero footer: will stick at the bottom -->
        <div class="hero-foot has-text-centered">
            {{-- Copyright &copy; <script>document.write(new Date().getFullYear())</script> unitechsolution.org All rights reserved. --}}
        </div>
      </section>
</div>


@endsection
