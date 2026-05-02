@extends('layouts.app')

@section('title', 'Dashboard')

@push('scripts')
@vite('resources/js/animation/dashboard.js')
@vite('resources/js/sidebar-functional.js')
@endpush

@section('css')
<link rel="stylesheet" href="{{ asset('css/main.css') }}" />
<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}" />
@endsection

@section('content')
<div class="main-dashboard">

    {{-- Top bar --}}
    <div style="display: flex; align-items: center; gap: 10px;">
        <button class="top-bar-element" id="sidebar-button">
            <img src="{{ asset('menu.svg') }}" height="30" width="30" alt="Menu" />
        </button>
        <h1 class="top-bar-element">Dashboard</h1>
        <div class="top-bar-element" style="width: 100%; display: flex; flex-direction: column; align-items: flex-end;">
            <button class="login-button">Login</button>
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

        {{--

            @foreach ($products as $product)
                <!-- <div class="" id="product"> ... </div> -->
            @endforeach
        --}}

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