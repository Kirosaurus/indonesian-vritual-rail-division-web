@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="main-dashboard">

    {{-- Top bar --}}
    <div style="display: flex; align-items: center; gap: 10px;">
        <button class="sidebar-button">
            <img src="{{ asset('menu.svg') }}" height="30" width="30" alt="Menu" />
        </button>
        <h1>Dashboard</h1>
        <div style="width: 100%; display: flex; flex-direction: column; align-items: flex-end;">
            <button class="login-button">Login</button>
        </div>
    </div>

    {{-- Announcement banner --}}
    <div class="announce">
        <p>Ini Buat Announcement</p>
    </div>

    {{-- New Products --}}
    <div>
        <h2>New Product</h2>
    </div>

    <div class="list-product">

        {{-- 
            Replace this static loop with a dynamic @foreach when
            you pass $products from your controller, e.g.:
            Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

            @foreach ($products as $product)
                <div class="product"> ... </div>
            @endforeach
        --}}

        @for ($i = 0; $i < 4; $i++)
        <div class="product">
            <div class="thumbnail-product">
                <p style="color: black;">Ini Thumbnail Produk</p>
            </div>
            <p class="nama-produk">Nama Produk</p>
            <p class="deskripsi-singkat-produk">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                sed do eiusmod tempor (Maksimal 120 karakter spasi juga ikut)
            </p>
        </div>
        @endfor

    </div>
</div>
@endsection
