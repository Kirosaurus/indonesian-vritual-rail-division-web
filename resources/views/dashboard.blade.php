@extends('layouts.app')

@section('title', 'Dashboard')

@push('scripts')
@vite('resources/js/topbar-functional.js')
@vite('resources/js/animation/dashboard.js')
@vite('resources/js/animation/pay-free.js')
@vite('resources/js/sidebar-functional.js')
@endpush

@section('css')
<link rel="stylesheet" href="{{ asset('css/animation.css') }}" />
<link rel="stylesheet" href="{{ asset('css/main.css') }}" />
<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}" />
<link rel="stylesheet" href="{{ asset('css/payware.css') }}" />
@endsection

@section('content')
<div class="main-page">

    {{-- Top bar --}}
    <div id="top-container">
        <div class="heading">
            <div class="title">
                <button class="top-bar-element" id="sidebar-button">
                    <img src="{{ asset('menu.svg') }}" height="25" width="25" alt="Menu" />
                </button>
                <img
                    src="{{ asset('dashboardWhite_icon.svg') }}">
                <h1 class="top-bar-element">Dashboard</h1>
            </div>
            <div class="top-bar-element" style="width: 100%; display: flex; flex-direction: column; align-items: flex-end;">
                @auth
                <div class="top-bar-element" id="user-card">
                    <div class="user-avatar">
                        <img src="{{ asset('user_icon.svg') }}" alt="User" />
                    </div>
                    <div class="user-info">
                        <p class="user-name">{{ auth()->user()->name }}</p>
                        <p class="user-email">{{ auth()->user()->email }}</p>
                    </div>
                </div>
                @else
                <a href="{{ url('login') }}">
                    <button class="login-button">Login</button>
                </a>
                @endauth
            </div>
        </div>
    </div>

    {{-- Announcement banner --}}
    <div class="body-element" id="announce">
        @foreach ($announcements as $announcement)
        <img
            class="announcement"
            src="{{ asset('storage/Announcements/'. $announcement->image) }}"
            alt="Announcement">
        @endforeach
    </div>

    {{-- New Products --}}
    <div class="body-element">
        <h2>New Product</h2>
    </div>

    <!-- <div class="body-element" id="list-product"> -->
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
    <!-- </div> -->
</div>
@endsection