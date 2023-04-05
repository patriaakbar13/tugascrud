<nav class="navbar navbar-expand-lg bg-info">
    <div class="container-fluid">
      <a class="navbar-brand fw-bold mx-3" href="#">Kopian</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse me-5" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/">Menu</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/cart">Cart</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">CRUD</a>
          </li>
        </ul>
        <ul class="navbar-nav d-flex ms-auto me-5">
          @auth
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                {{ Auth::user()->name }}
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Edit Profile</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
              </ul>
            </li>
          @endauth
          @guest
          <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">Login</a>
          </li>
          @endguest
          </ul>
      </div>
    </div>
  </nav>