@extends('layouts.app')

@section('title', 'Contact')

@push('scripts')
    @vite('resources/js/topbar-functional.js')
    @vite('resources/js/sidebar-functional.js')
    @vite('resources/js/responsive-helper/contact.js')
    @vite('resources/js/animation/contact.js')
@endpush

@section("css")
    <link rel="stylesheet" href="{{ asset('css/main.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/animation.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/contact.css') }}" />
@endsection

@section('content')
    <div class="main-page">
        <div id="top-container">
            <div class="heading">
                <div class="title">
                    <button id="sidebar-button">
                        <img src="{{ asset('menu.svg') }}" height="25" width="25" alt="Menu" />
                    </button>
                    <h1 style="white-space: nowrap;">Contact Us</h1>
                    <img src="{{asset('contactWhite_icon.svg')}}" width="30" height="30">

                </div>
                <div style="width: 100%; display: flex; flex-direction: column; align-items: flex-end;">
                </div>
            </div>
        </div>
        <div class="body-container">
            <div class="left-contact-section">
                <h2>Send us a Message!</h2>
                <p>If you have any trouble, feel free to contact us</p>
            </div>
            <div class="right-contact-section">
                <div class="social-media-section">
                    <button class="social-media-contact">
                        <a href="https://wa.me/+6282131520905">
                            <img src="{{ asset('whatsapp-icon.svg') }}">
                            <p>WhatsApp 1</p>
                    </button>
                    </a>
                    <button class="social-media-contact">
                        <a href="https://wa.me/+6289601056281">
                            <img src="{{ asset('whatsapp-icon.svg') }}">
                            <p>WhatsApp 2</p>
                    </button>
                    </a>
                    <button class="social-media-contact">
                        <a href="https://www.facebook.com/share/17tHYNhMne/">
                            <img src="{{ asset('facebook-icon.svg') }}">
                            <p>Facebook</p>
                        </a>
                    </button>
                </div>
            </div>
        </div>
    </div>
    </div>


@endsection