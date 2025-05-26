<header id="header" class="header fixed-top d-flex align-items-center">
  <div class="d-flex align-items-center justify-content-between">
    <a href="/dashboard" class="navbar-brand fw-bold" style="font-size: 1.5rem; color: #5d78fd;">
      StuntFree<span class="text-info">.</span>
    </a>
    <i class="bi bi-list toggle-sidebar-btn"></i>
  </div>

  <div class="search-bar">
    <form class="search-form d-flex align-items-center" method="POST" action="#">
      @csrf
      <input type="text" name="query" placeholder="Search" title="Enter search keyword">
      <button type="submit" title="Search"><i class="bi bi-search"></i></button>
    </form>
  </div>

  <nav class="header-nav ms-auto">
    <ul class="d-flex align-items-center">

      <li class="nav-item d-block d-lg-none">
        <a class="nav-link nav-icon search-bar-toggle" href="#">
          <i class="bi bi-search"></i>
        </a>
      </li>

      <li class="nav-item dropdown pe-3">
        <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
          <span class="d-block dropdown-toggle ps-2">
            @auth('web')
              {{ Auth::user()->name }}
            @elseif(auth()->guard('ortu')->check())
              {{ Auth::guard('ortu')->user()->nama }}
            @else
              Guest
            @endauth
          </span>
        </a>

        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
          <li class="dropdown-header">
            <h6>
              @auth('web')
                {{ Auth::user()->name }}
              @elseif(auth()->guard('ortu')->check())
                {{ Auth::guard('ortu')->user()->nama }}
              @else
                Guest
              @endauth
            </h6>
            <span>
              @auth('web')
                Admin
              @elseif(auth()->guard('ortu')->check())
                Orang Tua
              @endauth
            </span>
          </li>
          <li><hr class="dropdown-divider"></li>

          <li>
            <a class="dropdown-item d-flex align-items-center" href="#">
              <i class="bi bi-person"></i><span>My Profile</span>
            </a>
          </li>
          <li><hr class="dropdown-divider"></li>

          <li>
            <a class="dropdown-item d-flex align-items-center" href="#">
              <i class="bi bi-gear"></i><span>Account Settings</span>
            </a>
          </li>
          <li><hr class="dropdown-divider"></li>

          <li>
            @auth('web')
              <a class="dropdown-item d-flex align-items-center" href="{{ route('logout.user') }}">
                <i class="bi bi-box-arrow-right"></i><span>Sign Out</span>
              </a>
            @elseif(auth()->guard('ortu')->check())
              <a class="dropdown-item d-flex align-items-center" href="{{ route('logout.ortu') }}">
                <i class="bi bi-box-arrow-right"></i><span>Sign Out</span>
              </a>
            @endauth
          </li>
        </ul>
      </li>
    </ul>
  </nav>
</header>
