<nav class="navbar navbar-expand-lg bg-dark border-bottom border-body" data-bs-theme="dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="/home">Hotel Management</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarColor01">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/home">Home</a>
          </li>
           
          @if (Auth::check())
            <li class="nav-item">
              <a class="nav-link active" href="/hotels">Hotels</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="/registerhotel">Register Hotel</a>
            </li>
          @endif
        </ul>
        <div class="d-flex">
            @if (Auth::check())
                <a href="{{ route('logout') }}" class="btn btn-danger">
                    Logout
                </a>
                <p class="text-white btn btn-primary mx-2">{{ Auth::user()->name }}</p>
            @else
                <a href="{{ route('login') }}" class="btn btn-outline-success">Login</a>
                <a href="{{ route('register') }}"class="btn btn-outline-primary mx-2">Sign Up</a>
            @endif
        </div>
      </div>
    </div>
  </nav>