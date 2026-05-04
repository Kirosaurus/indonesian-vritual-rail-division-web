@extends('layouts.app')

@section('title', 'Contact')

@push('scripts')
@vite('resources/js/topbar-functional.js')
@vite('resources/js/sidebar-functional.js')
@vite('resources/js/responsive-helper/contact.js')
@endpush

@section("css")
<link rel="stylesheet" href="{{ asset('css/main.css') }}" />
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
                <img
                        src="{{asset('contactWhite_icon.svg')}}"
                        width="30"
                        height="30">

            </div>
            <div style="width: 100%; display: flex; flex-direction: column; align-items: flex-end;">
                <a href="{{ url('login') }}">
                    <button class="login-button">Login</button>
                </a>
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
                    <a>
                        <img src="{{ asset('whatsapp-icon.svg') }}">
                        <p>WhatsApp</p>
                    </a>
                </button>
                <button class="social-media-contact">
                    <a href="https://www.facebook.com/share/17tHYNhMne/">
                        <img src="{{ asset('facebook-icon.svg') }}">
                        <p>Facebook</p>
                    </a>
                </button>
            </div>
            <div class="mail-message">
                <form>
                    <label>Full Name</label>
                    <input type="text" placeholder="Enter your full name">
                    <label>Email</label>
                    <input type="email" placeholder="Enter your email">
                    <label>Message</label>
                    <textarea placeholder="Write your message"></textarea>
                    <button>
                        <img src="{{asset('send.svg')}}" width="30" height="30">
                        <p>Send</p>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>


@endsection