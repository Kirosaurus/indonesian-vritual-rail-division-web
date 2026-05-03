@extends('layouts.app')

@section('title', 'Terms & Condition')

@push('scripts')
@vite('resources/js/sidebar-functional.js')
@endpush

@section('css')
<link rel="stylesheet" href="{{ asset('css/terms&condition.css') }}">
<link rel="stylesheet" href="{{ asset('css/main.css') }}" />
@endsection

@section('content')
    <div class="main-terms-condition">
        {{-- Top bar --}}
        <div class="top-container">
            <button id="sidebar-button">
                <img src="{{ asset('menu.svg') }}" height="25" width="25" alt="Menu" />
            </button>
            <h1 class="title-terms">Terms & Condition</h1>
            <div style="width: 100%; display: flex; flex-direction: column; align-items: flex-end;">
                <button class="login-button">Login</button>
            </div>
        </div>

        {{-- Terms & Condition Content --}}
        <div class="terms-condition-wrapper">
            <div class="terms-condition-content">
                <p><b>Dengan melakukan pembelian konten mod game dari Indonesia  <span>Virtual Railway Division</span> (IVRD), pembeli
                    dianggap telah  <span>membaca, memahami, dan menyetujui</span> seluruh ketentuan berikut:</p>
                
                <ul class="terms-list">
                    <li>Pembeli <span>Wajib</span> memberikan data yang  <span>benar, jujur, dan dapat dipertanggungjawabkan</span> dalam proses transaksi.</li>
                    <li>Setiap pembelian bersifat final dan tidak dapat dikembalikan atau ditukar, kecuali terdapat kesalahan dari pihak IVRD.</li>
                    <li>Konten mod yang telah dibeli hanya diperuntukkan bagi penggunaan pribadi dan tidak diperbolehkan untuk diperjualbelikan kembali, dibagikan, atau didistribusikan tanpa izin resmi dari pihak IVRD.</li>
                    <li>Pembeli bertanggung jawab penuh atas penggunaan konten mod, termasuk risiko yang mungkin timbul pada perangkat atau sistem yang digunakan.</li>
                    <li>Tidak terdapat batasan usia dalam melakukan pembelian, namun pembeli dianggap telah memiliki kemampuan untuk memahami dan menyetujui ketentuan ini secara sadar.</li>
                    <li>Pembeli diharapkan bersikap amanah serta menjaga kepercayaan dengan tidak menyalahgunakan konten yang telah dibeli.</li>
                    <li>Pihak IVRD berhak melakukan pembaruan, perubahan, atau penyesuaian terhadap konten maupun ketentuan ini sewaktu-waktu tanpa pemberitahuan terlebih dahulu.</li>
                    <li>Segala bentuk pelanggaran terhadap ketentuan ini dapat mengakibatkan pembatasan atau penghentian akses terhadap layanan IVRD.</li></b>
                </ul>

                <p><b>Dengan melanjutkan transaksi, pembeli dianggap menyetujui seluruh syarat dan ketentuan yang berlaku.</b></p>
            </div>
        </div>
    </div>


@endsection