<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/base.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>

<header>
    <nav>
        <ul>
            <li><a href="{{ route('home') }}" class="@yield('home_active')">Accueil</a></li>
            <li><a href="{{ route('sauces.index') }}" class="@yield('catalogue_active')">Catalogue</a></li>
            <li><a href="{{ route('sauces.create') }}" class="@yield('add_sauce_active')">Ajouter une sauce</a></li>
        </ul>
    </nav>
    <a href="/" class="logo">
        <img src="{{ asset('img/HotTake_Logo.png') }}" alt="Hot takes logo">
    </a>
    @if (Auth::check())
        <div class="auth">
            <span>{{ Auth::user()->name }}</span>
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt"></i>
                Déconnexion
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    @else
        <div class="auth">
            <a href="{{ route('login') }}">Se connecter</a>
            <a href="{{ route('register') }}">S'enregistrer</a>
        </div>
    @endif
</header>

<div class="container">
    @if (session('success'))
        <div class="success-message">
            {{ session('success') }}
        </div>
    @endif
    
    @yield('content')
</div>

</body>
</html>
