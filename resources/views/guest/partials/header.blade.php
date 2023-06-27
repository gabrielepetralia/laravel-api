<header>

  <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm py-3 mb-3">
    <div class="container-fluid px-4">

      <a href={{ route('home') }} class="logo me-3 text-decoration-none text-white">
        <span class="fs-5 fw-semibold">BOOLFOLIO</span>
      </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Left Side Of Navbar -->
          <ul class="navbar-nav me-auto">
            <li class="nav-item">
              <a class="nav-link" href="{{ route('home') }}">Home</a>
            </li>
          </ul>

          <!-- Right Side Of Navbar -->

        </div>
      </div>
  </nav>

</header>
