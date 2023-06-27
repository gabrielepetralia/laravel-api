<header>

  <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm text-white h-100">
    <div class="container-fluid px-4">

      <a href="{{ route('admin.home') }}" class="logo me-3 text-white d-flex align-items-center">
        <img src="/img/logo.png" alt="Logo">
        <span class="fs-5 fw-semibold ms-2">BOOLFOLIO</span>
      </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Left Side Of Navbar -->
          <ul class="navbar-nav me-auto">
            <li class="nav-item">
              <a class="nav-link" href="{{ route('home') }}">Go to the Website</a>
            </li>
          </ul>

          <!-- Right Side Of Navbar -->
          <ul class="navbar-nav ml-auto">
              <!-- Authentication Links -->
              @guest
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('login') }}">Login</a>
              </li>
              @if (Route::has('register'))
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('register') }}">Register</a>
              </li>
              @endif
              @else
              <li class="nav-item me-2">
                <a class="nav-link d-flex align-items-center" href="#" title="Profile">
                  <i class="fa-solid fa-circle-user fs-4 me-2"></i>
                  <span>{{ Auth::user()->name }}</span>
                </a>
              </li>
              <li class="nav-item">
                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                  @csrf
                  <button type="submit" class="btn btn-danger" title="Logout">
                    <i class="fa-solid fa-arrow-right-from-bracket"></i>
                  </button>
                </form>
              </li>
              @endguest
          </ul>

        </div>
      </div>
  </nav>

</header>
