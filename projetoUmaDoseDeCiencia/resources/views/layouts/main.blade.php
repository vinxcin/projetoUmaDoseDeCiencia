<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="/img/atomo.png" type="image/x-icon">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<header>
    <div class="wrapper">
        <a href="{{ url('/') }}">
            <img src="img/atomo.png">
            <span> Uma Dose de Ciência</span>
        </a>
        <nav>
            <!--ONDE FICAM OS MENUS PRINCIPAIS DO SITE -->
            <ul>
                @if (Route::has('login'))
                @auth
                <li>
                    <a href="{{ url('/dashboard') }}">{{ Auth::user()->name }}</a>
                </li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-jet-dropdown-link href="{{ route('logout') }}" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                            {{ __('Sair') }}
                        </x-jet-dropdown-link>
                    </form>

                </li>

                @else

                <li><a href="{{ route('login') }}">Entrar</a></li>
                @if (Route::has('register'))
                <li>
                    <a href="{{ route('register') }}">Registrar</a>
                </li>
            </ul>
        </nav>
    </div>
    @endif
    @endauth
    @endif
</header>

<body>
    @yield('content')
</body>
<footer>
    <!--footer é a barra que fica no final da página -->
    <p>Uma Dose de Ciência &copy; 2021</p>
</footer>

</html>