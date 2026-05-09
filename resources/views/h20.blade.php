@extends('layouts.app')

@section('title', 'How To Order')

@push('scripts')
    @vite('resources/js/topbar-functional.js')
    @vite('resources/js/sidebar-functional.js')
@endpush

@section('css')
    <link rel="stylesheet" href="{{ asset('css/how2order.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/animation.css') }}" />
@endsection

@section('content')
    <div class="main-page">
        {{-- Top bar --}}
        <div id="top-container">
            <div class="heading">
                <div class="title">
                    <button id="sidebar-button">
                        <img src="{{ asset('menu.svg') }}" height="25" width="25" alt="Menu" />
                    </button>
                    <img src="{{asset('tncWhite_icon.svg')}}" width="40" height="40">
                    <h1>How To Order </h1>
                </div>
                <div style="width: 100%; display: flex; flex-direction: column; align-items: flex-end;">
                    <a href="{{ url('login') }}">
                        <button class="login-button">Login</button>
                    </a>
                </div>
            </div>
        </div>

        <div class="container">

            <div class="special-box">
                <h2>Ikuti langkah berikut untuk menyelesaikan pesananmu</h2>
            </div>

            <div class="steps-row">

                <div class="step-card" data-step="1" tabindex="0">
                    <div class="step-number">1</div>
                    <h3>Pilih Produk</h3>
                    <p>Telusuri katalog dan pilih konten mod yang paling cocok. Pastikan membaca detail produk dan harga
                        sebelum lanjut.</p>
                </div>

                <div class="step-card" data-step="2" tabindex="0">
                    <div class="step-number">2</div>
                    <h3>Pilih Narahubung</h3>
                    <p>Hubungi narahubung resmi melalui WhatsApp atau DM untuk konfirmasi pesanan dan ketersediaan.</p>
                </div>

                <div class="step-card" data-step="3" tabindex="0">
                    <div class="step-number">3</div>
                    <h3>Selesaikan Pembayaran</h3>
                    <p>Pilih metode pembayaran yang tersedia, lalu unggah bukti jika diperlukan agar pesanan diproses cepat.
                    </p>
                </div>

            </div>

        </div>

    </div>

    <!-- <script>
        document.addEventListener('DOMContentLoaded', function () {
            const stepCards = document.querySelectorAll('.step-card');
            function activateCard(card) {
                stepCards.forEach(item => item.classList.remove('active'));
                card.classList.add('active');
            }
            stepCards.forEach(card => {
                card.addEventListener('click', () => activateCard(card));
                card.addEventListener('keydown', event => {
                    if (event.key === 'Enter' || event.key === ' ') {
                        event.preventDefault();
                        activateCard(card);
                    }
                });
            });
        });
    </script> -->

@endsection