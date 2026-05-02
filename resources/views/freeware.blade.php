@extends('layouts.app')

@section('title', 'Freeware')

@push('scripts')
@vite('resources/js/dashboard.js')
@vite('resources/js/dashboard.js')
@endpush

@section('content')
<div class="main-freeware">
    {{-- Top bar --}}
    <div class="top-bar-element" style="display: flex; align-items: center; gap: 10px;">
        <button id="sidebar-button">
            <img src="{{ asset('menu.svg') }}" height="30" width="30" alt="Menu" />
        </button>
        <h1>Freeware</h1>
        <div style="width: 100%; display: flex; flex-direction: column; align-items: flex-end;">
            <button class="login-button">Login</button>
        </div>
    </div>

    {{-- New Products --}}
    <div class="top-bar-element" id="main-content">
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
                <div id="search-container">
                    <input type="text" class="search-input" placeholder="Search a product " />
                </div>
            </div>
        </div>
    </div>

    <div id="list-product-freeware">
        {{--

            @foreach ($products as $product)
            <div class="product"> ... </div>
            @endforeach
            --}}

        @for ($i = 0; $i < 12; $i++) 
            <div class="" id="product">
            <div class="thumbnail-product">
                <p style="color: black;">Ini Thumbnail Produk</p>
            </div>
            <p class="nama-produk">Nama Produk</p>
            <p class="deskripsi-singkat-produk">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                sed do eiusmod tempor (Maksimal 120 karakter spasi juga ikut)
            </p>
            <div class="contaner-harga-freeware">
                <span><br>FREE</span>
            </div>
    </div>
    @endfor
</div>
</div>

@endsection