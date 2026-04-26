@extends('layouts.app')

@section('title', 'Payware')

@section('content')
    <div class="main-payware">

        {{-- Top bar --}}
        <div style="display: flex; align-items: center; gap: 10px;">
            <button class="sidebar-button">
                <img src="{{ asset('menu.svg') }}" height="30" width="30" alt="Menu" />
            </button>
            <h1>Payware</h1>
            <div style="width: 100%; display: flex; flex-direction: column; align-items: flex-end;">
                <button class="login-button">Login</button>
            </div>
        </div>

        {{-- New Products --}}
        <div class="list-sortir">
            <button class="sort-button">
                <img src="{{ asset('sort.svg') }}" height="30" width="40" alt="Filter" />
            </button>
            <div class="sortir">
                <button class="sort">Price</button>
                <button class="sort">Name</button>
                <button class="sort">Rating</button>
                <button class="ascend-descend-button">
                    <img class="arrow-sort" src="{{ asset('asc-dsc.svg') }}" height="25" width="25" alt="Ascending" />
                    Ascending</button>
            </div>
        </div>

        <div class="list-product-payware">

            {{--
            Replace this static loop with a dynamic @foreach when
            you pass $products from your controller, e.g.:
            Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

            @foreach ($products as $product)
            <div class="product"> ... </div>
            @endforeach
            --}}

            @for ($i = 0; $i < 12; $i++) {{-- tergantung banyaknya data di database --}}
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