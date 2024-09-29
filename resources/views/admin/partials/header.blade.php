<header>
    <div class="container-fluid">
        <nav class="row justify-content-between py-2">
            <div class="col-2 pub">
                <a href="{{ route('home') }}">Boolpress</a>
            </div>
            <div class="col d-flex justify-content-end">
                <ul class=" col-2 d-flex justify-content-between">
                    @guest
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle log" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                Accedi
                            </a>
                            <div class="dropdown-menu dropdown-menu-end drop" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item log" href="{{ route('login') }}">Login</a>
                                <a class="dropdown-item log" href="{{ route('register') }}">Registrati</a>
                            </div>
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle log" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-end drop" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item log" href="{{ route('admin.home') }}">Admin</a>
                                <a class="dropdown-item log" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>

            </div>
        </nav>

    </div>
</header>
