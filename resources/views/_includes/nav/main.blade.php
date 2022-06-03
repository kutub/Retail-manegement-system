<nav class="navbar" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
     
      <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
      </a>
    </div>
  
    <div id="navbarBasicExample" class="navbar-menu">
      
  
      <div class="navbar-end">
       
        <li class="navbar-item has-dropdown is-hoverable" >
              <a class="navbar-link">Lang: {{strtoupper(app()->getLocale())}}</a>
              <div class="navbar-dropdown">
                @foreach (config('app.available_locales') as $locale)
                <a class="navbar-item" @if (strtoupper(\Illuminate\Support\Facades\Route::currentRouteName())) href="{{ route(\Illuminate\Support\Facades\Route::currentRouteName(), [$locale, 1]) }}" @endif 
                  @if (app()->getLocale() == $locale) style="font-weight: bold; text-decoration: underline" @endif>{{ strtoupper($locale) }}
                </a>
                @endforeach
              </div>
        </li>
      
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
                <a class="navbar-item" href="{{route('manage.dashboard', app()->getLocale())}}">
                  <span class="icon">
                    <i class="fa fa-fw fa-cog m-r-5"></i>
                  </span>Settings
                </a>
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
            <a href="{{route('register', app()->getLocale())}}" class="button is-primary">
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