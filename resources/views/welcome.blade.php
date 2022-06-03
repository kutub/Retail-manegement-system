<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    
         <!-- CSRF Token -->
         <meta name="csrf-token" content="{{ csrf_token() }}">
    
        <title>Medis - Medical Inventory $ Sales</title>
    
    
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <nav class="navbar" style="background-color: #fff" role="navigation" aria-label="main navigation">
            <div class="navbar-brand">
              <img src="/images/logo/logo.jpg" class="p-t-15 p-l-15" width="200px" alt="">
              <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
              </a>
            </div>
          
            <div id="navbarBasicExample" class="navbar-menu">
              
          
              <div class="navbar-end">
                <div class="navbar-item">
                  @if (!Auth::guest())
                    <div class="navbar-item has-dropdown is-hoverable">
                      <a class="navbar-link">
                        Hey {{ Auth::user()->name }}
                      </a>
              
                      <div class="navbar-dropdown">
                        
                        {{-- <a class="navbar-item">
                          <span class="icon">
                            <i class="fa fa-fw fa-user-circle-o m-r-5"></i>
                          </span>Profile
                        </a> --}}
                        <a class="navbar-item">
                          <span class="icon">
                            <i class="fa fa-fw fa-bell m-r-5"></i>
                          </span>Notifications
                        </a>
                        {{-- <a class="navbar-item" href="{{route('manage.dashboard')}}">
                          <span class="icon">
                            <i class="fa fa-fw fa-cog m-r-5"></i>
                          </span>Manage
                        </a> --}}
                        <hr class="navbar-divider">
                        
                        <a class="navbar-item" href="{{ route('logout', app()->getLocale()) }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                            <span class="icon">
                              <i class="fa fa-fw fa-sign-out m-r-5"></i>
                            </span>
                            {{ __('Logout') }}
                        </a>
        
                        <form id="logout-form" action="{{ route('logout', app()->getLocale()) }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                      
                      </div>
                    </div>
                  @else
                    <div class="buttons">
                    <a href="{{route('register', )}}" class="button is-primary">
                        <strong>Sign up</strong>
                      </a>
                      <a href="{{route('login', app()->getLocale())}}" class="button is-light">
                        Log in
                      </a>
                    </div>
                  @endif
                </div>
              </div>
            </div>
          </nav>
        <div class="flex-center position-ref full-height">
            <div class="content" style="margin-top: -170px;">
                <div class="m-b-md">
                   <h1>Congrasulation {{auth()->user()->name}}!!</h1>
                   <h4>Your Registration is Successful. Please check your email to get access.</h4>
                </div>
            </div>
        </div>
    </body>
</html>
