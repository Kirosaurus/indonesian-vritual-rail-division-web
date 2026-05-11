@extends('layouts.app')

@section('title', 'Dashboard')

@push('scripts')
    @vite('resources/js/products-popup.js')
    @vite('resources/js/topbar-functional.js')
    @vite('resources/js/animation/dashboard.js')
    @vite('resources/js/animation/announcements-animation.js')
    @vite('resources/js/animation/pay-free.js')
    @vite('resources/js/sidebar-functional.js')
@endpush

@section('css')
    <link rel="stylesheet" href="{{ asset('css/animation.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/main.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/products.css') }}" />
@endsection

@section('content')

    <div class="main-page">

        {{-- Top bar --}}
        <div id="top-container">
            <div class="heading">
                <div class="title">
                    <button class="top-bar-element" id="sidebar-button">
                        <img src="{{ asset('icons/menu.svg') }}" height="25" width="25" alt="Menu" />
                    </button>
                    <img src="{{ asset('icons/dashboardWhite_icon.svg') }}">
                    <h1 class="top-bar-element">Dashboard</h1>
                </div>
                <div class="top-bar-element"
                    style="width: 100%; display: flex; flex-direction: column; align-items: flex-end;">
                </div>
            </div>
        </div>

    <div id="product-modal" class="modal hidden" aria-hidden="true">
        <div class="modal-sizer">
            <div class="modal-card">
                <div class="close-container">
                    <button class="modal-close" type="button" data-close="true">
                        <img
                            src="{{ asset('icons/close_icon.svg')}}"
                        >
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
                            {{-- Generated dinamis via JavaScript --}}
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

        {{-- Announcement banner --}}
        <div class="body-element" id="announce">
            <div class="announcement-container">
                <div class="announcement-wrapper">
                    @foreach ($announcements as $announcement)
                        <img class="announcement" src="{{ asset('storage/' . $announcement->image) }}" alt="Announcement">
                    @endforeach
                    {{-- Duplicate first image untuk seamless loop --}}
                    @if($announcements->count() > 0)
                        <img class="announcement" src="{{ asset('storage/' . $announcements->first()->image) }}"
                            alt="Announcement">
                    @endif
                </div>
            </div>
        </div>

        {{-- New Products --}}
        <div class="body-element">
            <h2>New Product</h2>
        </div>
        <!-- <div class="body-element" id="list-product"> -->
        <div class="list-product-container">
            <div id="list-product-pay-free" class="list-product-payware">
                @foreach ($products as $product)
                    @php
                        $text = "Halo minn, saya tertarik untuk melakukan pembelian dari katalog dengan nama item '$product->name' Mau tanya-tanya dulu dong minn 🙌🙌";

                        $tags = $product->tags->pluck('name')->toArray();

            $imagePaths = $product->images->pluck('path')->map(fn($path) => asset('storage/' . $path))->toArray();
            $imageSrc = count($imagePaths) > 0 ? $imagePaths[0] : asset('storage/image-products/unknownThumbnail.png');
            @endphp
            <div class="product-card" id="product"
                data-name="{{ $product->name }}"
                data-desc="{{ $product->description }}"
                data-price="{{ 'Rp '. $product->price ? $product->price : 'FREE' }}"
                data-img="{{ json_encode($imagePaths) }}"
                data-tags=" {{json_encode($tags)}} "
                data-text="{{ $text }}">
                <div class="thumbnail-product">
                    <img src="{{ $imageSrc }}" class="thumbnail-img" alt="">
                </div>
                <p class="nama-produk">{{$product->name}}</p>
                <p class="deskripsi-singkat-produk">
                    {{$product->description}}
                </p>
                <div class="container-harga">
                    <span>{{ $product->price ? 'Rp '.$product->price : 'FREE'}}</span>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <!-- </div> -->
</div>
@endsection