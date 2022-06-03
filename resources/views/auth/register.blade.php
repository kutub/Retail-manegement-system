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
                  <form method="POST" action="{{ route('register', app()->getLocale()) }}">
                    @csrf


                    <div class="field is-horizontal">
                        <div class="field-label is-normal">
                          <label class="label">{{ __('Full Name') }}</label>
                        </div>
                        <div class="field-body">
                          <div class="field">
                            <p class="control is-expanded">
                                <input id="name" placeholder="name" type="text" class="input @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </p>
                          </div>
                        </div>
                    </div>

                    <div class="field is-horizontal">
                        <div class="field-label is-normal">
                          <label class="label">{{ __('E-Mail Address') }}</label>
                        </div>
                        <div class="field-body">
                          <div class="field">
                            <p class="control is-expanded">
                                <input id="email" placeholder="email" type="email" class="input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
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
                                <input id="password" placeholder="password" type="password" class="input @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </p>
                          </div>
                        </div>
                    </div>

                    <div class="field is-horizontal">
                        <div class="field-label is-normal">
                          <label class="label">{{ __('Confirm Password') }}</label>
                        </div>
                        <div class="field-body">
                          <div class="field">
                            <p class="control is-expanded">
                                <input id="password-confirm" placeholder="password" type="password" class="input" name="password_confirmation" required autocomplete="new-password">
                            </p>
                          </div>
                        </div>
                    </div>

                    <div class="field p-t-15 is-grouped is-grouped-right">
                        <p class="control is-pulled-right">
                            <button type="submit" class="button is-primary">
                                {{ __('Register') }}
                            </button>
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
