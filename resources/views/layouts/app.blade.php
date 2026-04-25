<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>IVRD – @yield('title', 'Dashboard')</title>
    <link rel="stylesheet" href="{{ asset('css/ivrd.css') }}" />
</head>
<body>

<main class="app-root">
    {{-- Fixed background texture --}}
    <img class="background-img" src="{{ asset('body_background.png') }}" alt="" />

    <div class="app-wrapper">
        {{-- Sidebar --}}
        @include('partials.sidebar')

        {{-- Page content --}}
        <div class="page-content">
            @yield('content')
        </div>
    </div>
</main>

</body>
</html>
