<nav class="navbar navbar-expand-lg navbar-light bg-black">
    <div class="main-logo">
        <a href="/">
            <img class="pr-3" src="https://laravel.com/img/logomark.min.svg" alt="logo">
            <img class="pr-5" src="https://laravel.com/img/logotype.min.svg" alt="logo">
        </a>
    </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('contact-us') }}">НАПИШІТЬ НАМ</a>
            </li>
        </ul>

        <ul class="account pl-0 mb-0 mr-5">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle pl-0" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-user mr-1"></i>
                    @auth
                        {{ auth()->user()->name }} {{ auth()->user()->last_name }}
                    @else
                        АККАУНТ
                    @endauth
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    @auth
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a class="dropdown-item" href="{{ route('profile.index') }}">Профіль</a>
                            <a class="dropdown-item" role="button" onclick="javascript:this.parentNode.submit()">Вийти</a>
                        </form>
                    @else
                        <a class="dropdown-item" href="{{ route('login') }}">Login</a>
                        <a class="dropdown-item" href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            </li>
        </ul>
    </div>
</nav>
