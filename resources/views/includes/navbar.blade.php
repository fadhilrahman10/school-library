<nav class="navbar navbar-store navbar-expand-lg navbar-light fixed-top" data-aos="fade-down">
    <button class="btn btn-secondary d-md-none mr-auto mr-2" id="menu-toggle">
        &laquo; Menu
    </button>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto d-none d-lg-flex">
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    {{ Auth::user()->name }}
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('user.edit', Auth::user()->id) }}">Profile</a>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>

        </ul>
        <!-- Mobile Menu -->
        {{-- <ul class="navbar-nav d-block d-lg-none mt-3">
            <li class="nav-item">
                <a class="nav-link" href="#">
                    Hi, Fadhil
                </a>
            </li>
        </ul> --}}
    </div>
</nav>
