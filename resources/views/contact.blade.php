@extends('layouts.app')

@section('title', 'Contact')

@section('content')
<div class="main-contact">
    <div class="top-container">
        <button class="sidebar-button">
            <img src="{{ asset('menu.svg') }}" height="30" width="30" alt="Menu" />
        </button>
        <h1>Contact Us</h1>
    </div>
    <div class="body-container">
        <div>

        </div>
        <div class="right-contact-section">
            <div class="social-media-section">
                <button class="social-media-contact">
                    <img src="{{ asset('whatsapp-icon.svg') }}">
                    <p>WhatsApp</p>
                </button>
                <button class="social-media-contact">
                    <img src="{{ asset('facebook-icon.svg') }}">
                    <p>Facebook</p>
                </button>
            </div>
            <div class="mail-message">
                
            </div>
        </div>
    </div>
</div>


@endsection