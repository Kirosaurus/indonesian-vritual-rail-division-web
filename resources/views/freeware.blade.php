@extends('layouts.app')

@section('title', 'Freeware')

@push('scripts')
@vite('resources/js/topbar-functional.js')
@vite('resources/js/toolbar-functional.js')
@vite('resources/js/sidebar-functional.js')
@vite('resources/js/animation/pay-free.js')
@endpush

@section('css')
<link rel="stylesheet" href="{{ asset('css/main.css') }}" />
<link rel="stylesheet" href="{{ asset('css/freeware.css') }}" />
<link rel="stylesheet" href="{{ asset('css/payware.css') }}" />
<link rel="stylesheet" href="{{ asset('css/animation.css') }}" />
@endsection

@section('content')
<div class="main-page">
    {{-- Top bar --}}
    <div id="top-container" class="top-bar-element">
        <div class="heading">
            <div class="left-top-container">
                <div class="title">
                    <button id="sidebar-button">
                        <img src="{{ asset('menu.svg') }}" height="25" width="25" alt="Menu" />
                    </button>
                    <img
                        src="{{asset('freewareWhite_icon.svg')}}"
                        width="50"
                        height="50">
                    <h1>Freeware </h1>
                </div>
            </div>
            <div class="right-top-container">
                <div class="list-sortir">
                    <div style="position: relative;">
                        <button class="sort-button">
                            <img src="{{ asset('sort.svg') }}" height="30" width="30" alt="Filter" />
                        </button>
                        <div class="sortir">
                            <button class="sort">Price</button>
                            <button class="sort">Name</button>
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
                        <input type="text" id="search-box" class="search-input" placeholder="Cari Produk" />
                        <img class="search-icon" src="{{ asset('search-icon.svg') }}" height="25" width="25" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="list-product-container">
            <div  id="list-product-pay-free" class="list-product-payware">
                @foreach ($products as $product)
                <div class="product-card" id="product"
                    data-name="{{ $product->name }}"
                    data-desc="{{ $product->description }}"
                    data-price="Rp. {{ $product->price }}"
                    data-img="{{ asset('storage/' . optional($product->images->first())->path) }}">
                    @php
                    $imagePath = optional($product->images->first())->path;
                    $imageSrc = $imagePath ? asset('storage/' . $imagePath) : asset('storage/image-products/unknownThumbnail.png');
                    @endphp
                    <div class="thumbnail-product">
                        <img src="{{ $imageSrc }}" class="thumbnail-img" alt="">
                    </div>
                    <p class="nama-produk">{{$product->name}}</p>
                    <p class="deskripsi-singkat-produk">
                        {{$product->description}}
                    </p>
                    <div class="container-harga">
                        <span>Rp. {{$product->price}}</span>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
            {{--
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
        --}}
    </div>
</div>
</div>

@endsection