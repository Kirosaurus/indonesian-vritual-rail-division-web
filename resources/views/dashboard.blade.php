@extends('layouts.app')

@section('title', 'Dashboard')

@push('scripts')
@vite('resources/js/topbar-functional.js')
@vite('resources/js/animation/dashboard.js')
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
        <p>Ini Buat Announcement</p>
    </div>

    {{-- New Products --}}
    <div class="body-element">
        <h2>New Product</h2>
    </div>

    <div class="body-element" id="list-product">

        <!-- {{-- -->

        @foreach ($products as $product)
        <!-- <div class="" id="product"> ... </div> -->
        <div class="" id="product">
            <div class="thumbnail-product">
                <p style="color: black;">Ini Thumbnail Produk</p>
            </div>
            <p class="nama-produk">{{$product->name}}</p>
            <p class="deskripsi-singkat-produk">
                {{$product->description}}
            </p>
        </div>
        @endforeach
        <!-- --}} -->

        @for ($i = 0; $i < 8; $i++)
                <div class="" id="product">
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