<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Digiatas</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- CSS-->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css">

</head>

<body>

    <div class="login">
        @auth('admin')
        <a class="login" id="login_admin" href="{{ route('admin.dashboard') }}">Painel Admin</a>
        @else
        <a class="login" id="login_admin" href="{{ route('admin.login') }}">Login Admin</a>
        @endauth


        @if (Route::has('login'))

        @auth
        <a class="login" id="login_user" href="{{ url('/dashboard') }}">Painel</a>
        @else
        <a class="login" id="login_user" href="{{ route('login') }}">Entrar</a>
        <!-- 
            @if (Route::has('register'))
            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Registrar</a>
            @endif -->
        @endauth
    </div>
    @endif

    <div class="login">
        <img src="{{ asset('/img/DIGIATAS.png') }}" />
    </div>

</body>

</html>