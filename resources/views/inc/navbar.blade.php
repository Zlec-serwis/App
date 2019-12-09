<nav class="navbar navbar-expand-md navbar-light bg-light shadow-sm">
    <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!-- Left Side Of Navbar -->
      <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="/about">O nas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/services">Kategorie</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/posts">Zlecenia</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/users">Wykonawcy</a>
          </li>
      </ul>
      <!-- Right Side Of Navbar -->
      <ul class="navbar-nav ml-auto">
      <!-- Authentication Links -->
        <li>
          @include('forms.search')
        </li>
        @guest
          <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
          </li>
        @if (Route::has('register'))
          <li class="nav-item">
            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
          </li>
          @endif
        @else
        <li class="dropdown nav-item">

            @if(!Auth::user()->doer)
            <a class="btn btn-default btn-outline-dark" href="/doer/create" role="button">Zostań wykonawcą</a>
            @endif
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="position:relative; padding-left:50px;">
            <img src="/uploads/avatars/{{ Auth::user()->avatar }}" style="width:32px; height:32px; position:absolute; left:10px; border-radius:50%">
              {{ Auth::user()->name }} <span class="caret"></span>
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="/profile">Profil</a>
            <a class="dropdown-item" href="/dashboard">Moje oferty</a>
            @if(Auth::user()->doer=1)
            <a class="dropdown-item" href="/workboard">Moje zlecenia</a>
            @endif
                <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </li>
        @endguest
      </ul>
    </div>
  </div>
</nav>