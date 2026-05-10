<!DOCTYPE html>
<html lang="en">



<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>IVRD – @yield('title', 'Login Page')</title>
    <link rel="stylesheet" href="{{ asset('css/ivrd.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/animation.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/main.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/adminLayout.css') }}" />
</head>

<body>
    <main class="app-root-admin">
        <div class="app-wrapper-admin">
            {{-- Page content --}}
            <div class="page-content-admin">
                @include('partials.adminBar')
                @yield('content')
            </div>
        </div>
    </main>
    @vite('resources/js/navbar-dropdown.js')
    @stack('scripts')
</body>

</html>