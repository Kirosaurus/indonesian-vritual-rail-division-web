@extends('layouts.app')

@section('title', 'Freeware')

@push('scripts')
    @vite('resources/js/toolbar-functional.js')
    @vite('resources/js/sidebar-functional.js')
    @vite('resources/js/animation/freeware.js')
@endpush

@section('css')
    <link rel="stylesheet" href="{{ asset('css/main.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/freeware.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/animation.css') }}" />
@endsection

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
        <div id="toolbar">
            <div class="list-sortir">
                <div style="position: relative;">
                    <button class="sort-button">
                        <img src="{{ asset('sort.svg') }}" height="30" width="30" alt="Filter" />
                    </button>
                    <!-- <div class="sortir">
                                <button class="sort"><img src="{{asset('dollarWhite.svg')}}" height="20" width="20"/></button>
                                <button class="sort">Name</button>
                                <button class="sort">Rating</button>
                            </div> -->
                    <div class="sortir">
                        <button class="sort">Price</button>
                        <button class="sort">Name</button>
                        <button class="sort">Rating</button>
                    </div>
                </div>
                <button class="ascend-descend-button">
                    <img class="arrow-sort" src="{{ asset('asc-dsc.svg') }}" height="25" width="25" alt="Ascending" />
                    <span>
                        Ascending
                    </span>
                </button>
            </div>
            <div id="search-container" style="position: relative; display: flex; align-items: center;">
                {{-- Give the input an id --}}
                <div class="search-bar">
                    <input type="text" id="search-box" class="search-input" placeholder="Search a product " />
                    <img class="search-icon" src="{{ asset('search-icon.svg') }}" height="25" width="25" />
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
                    <div class="container-harga-freeware">
                        <span><br>FREE</span>
                    </div>
                </div>
            @endfor
        </div>
    </div>

@endsection