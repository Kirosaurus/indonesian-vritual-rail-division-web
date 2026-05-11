@extends('layouts.app')

@section('title', 'Payware')

@push('scripts')
    @vite('resources/js/products-popup.js')
    @vite('resources/js/topbar-functional.js')
    @vite('resources/js/toolbar-functional.js')
    @vite('resources/js/sidebar-functional.js')
    @vite('resources/js/animation/pay-free.js')
    @vite('resources/js/payware-filter.js')
@endpush

@section('css')

    <link rel="stylesheet" href="{{ asset('css/main.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/products.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/animation.css') }}" />
@endsection

@php
    function formatPrice($price)
    {
        if (!$price || $price === 'FREE' || $price == 0) {
            return 'FREE';
        }
        return number_format($price, 0, '', '.');
    }
@endphp

@section('content')
    <style>

    </style>

    <div class="main-page">
        {{-- Top bar --}}
        <div id="top-container" class="top-bar-element">
            <div class="heading">
                <div class="left-top-container">
                    <div class="title">
                        <button id="sidebar-button">
                            <img src="{{ asset('icons/menu.svg') }}" height="25" width="25" alt="Menu" />
                        </button>
                        <img src="{{ asset('icons/paywareWhite_icon.svg') }}" width="50" height="50">
                        <h1>Payware </h1>
                    </div>
                </div>
                <div class="right-top-container">
                    <div class="list-sortir">
                        <div class="sort-wrapper">

                            <div style="position: relative;">
                                <button class="sort-button">
                                    <img src="{{ asset('icons/sort.svg') }}" height="30" width="30" alt="Filter" />
                                </button>
                            </div>
                            <div class="sortir">
                                <button class="sort">Price</button>
                                <button class="sort">Name</button>
                            </div>

                        </div>
                        <button class="ascend-descend-button">
                            <img class="arrow-sort" src="{{ asset('icons/asc-dsc.svg') }}" height="25" width="25"
                                alt="Ascending" />
                            <span>
                                Ascending
                            </span>
                        </button>
                    </div>
                    <div id="search-container" style="position: relative; display: flex; align-items: center;">
                        {{-- Give the input an id --}}
                        <div class="search-bar">
                            <input type="text" id="search-box" class="search-input" placeholder="Cari Produk" />
                            <img class="search-icon" src="{{ asset('icons/search-icon.svg') }}" height="25"
                                width="25" />
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- New Products --}}
        <div id="product-modal" class="modal hidden" aria-hidden="true">
            <div class="modal-sizer">
                <div class="modal-card">
                    <div class="close-container">
                        <button class="modal-close" type="button" data-close="true">
                            <img src="{{ asset('icons/close_icon.svg') }}">
                        </button>
                    </div>
                    <div class="modal-contain">
                        <div class="left-modal">
                            <div id="modal-thumb-viewer">
                                <img class="modal-thumb" alt="Product image" />
                            </div>
                            <div class="list-thumbnail" id="list-thumbnail">
                                {{-- Generated dinamis via JavaScript --}}
                            </div>
                        </div>
                        <div class="right-modal">
                            <h3 id="modal-name"></h3>
                            <div class="modal-price">
                                <span id="modal-price"></span>
                            </div>
                            <p id="modal-desc"></p>
                            <div class="tag-products" id="tag-products">

                            </div>
                            <div class="action-container">
                                <span>Mau tanya-tanya atau mau beli produknya? Hubungi kontak di bawah ini.</span>
                                <div class="whatsapp-contact">
                                    <a href="https://wa.me/+6281366950138"> {{-- NOMERNYA MASIH PAKE PUNYA GANDHII --}}
                                        <button class="whatsapp-order-button">
                                            <img src="{{ asset('icons/whatsapp-icon.svg') }}">
                                            <p>WhatsApp 1</p>
                                        </button>
                                    </a>
                                    <a href="https://wa.me/+6289601056281">
                                        <button class="whatsapp-order-button">
                                            <img src="{{ asset('icons/whatsapp-icon.svg') }}">
                                            <p>WhatsApp 2</p>
                                        </button>
                                    </a>
                                </div>
                            </div>
                            <div class="S&K">
                                <span>Dengan membeli produk ini, anda sudah membaca dan setuju dengan
                                    <a href="/terms&condition" target="_blank">syarat dan ketentuan</a> yang berlaku.</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-overlay" data-close="true"></div>
        </div>
        <div class="list-product-container">
            <div id="list-product-pay-free" class="list-product-payware">
                @foreach ($products as $product)
                    @php
                        $text = "Halo minn, saya tertarik untuk melakukan pembelian dari katalog dengan nama item '$product->name' Mau tanya-tanya dulu dong minn 🙌🙌";

                        $tags = $product->tags->pluck('name')->toArray();

                        $imagePaths = $product->images
                            ->pluck('path')
                            ->map(fn($path) => asset('storage/' . $path))
                            ->toArray();
                        $imageSrc = count($imagePaths) > 0 ? $imagePaths[0] : asset('unknownThumbnail.png');
                    @endphp
                    <div class="product-card" id="product" data-name="{{ $product->name }}"
                        data-desc="{{ $product->description }}"
                        data-price="{{ $product->price ? $product->price : 'FREE' }}"
                        data-img="{{ json_encode($imagePaths) }}" data-tags=" {{ json_encode($tags) }} "
                        data-text="{{ $text }}">

                        <div class="thumbnail-product">
                            <img src="{{ $imageSrc }}" class="thumbnail-img" alt="">
                        </div>
                        <p class="nama-produk">{{ $product->name }}</p>
                        <p class="deskripsi-singkat-produk">
                            {{ $product->description }}
                        </p>
                        <div class="container-harga">
                            <span>Rp {{ $product->price }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <script>
        const containerHarga = document.querySelectorAll('.container-harga > span')
        document.querySelectorAll('.product-card').forEach((item, i) => {
            let price = item.dataset.price
            price = parseInt(price)
            price = price.toLocaleString('id-ID', {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            });
            containerHarga[i].textContent = 'Rp ' + price;
        })
    </script>
@endsection
