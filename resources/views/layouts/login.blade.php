<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>IVRD – @yield('title', 'Login Page')</title>
    <link rel="stylesheet" href="{{ asset('css/loginPage.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/animation.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/main.css') }}" />
</head>

<body>

    <main class="app-root">
        {{-- Fixed background texture --}}
        <img class="background-img-login" src="{{ asset('background_login.png') }}" alt="" />

        <div class="app-wrapper">
            {{-- Page content --}}
            <div class="page-content">
                @yield('content')
            </div>
        </div>
    </main>
    @stack('scripts')
</body>

</html>