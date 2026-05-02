@extends('layouts.app')

@section('title', 'Contact')

@section('content')
<div class="main-contact">
    <div class="top-container">
        <button id="sidebar-button">
            <img src="{{ asset('menu.svg') }}" height="25" width="25" alt="Menu" />
        </button>
        <h1 style="white-space: nowrap;">Contact Us</h1>
        <div style="width: 100%; display: flex; flex-direction: column; align-items: flex-end;">
            <button class="login-button">Login</button>
        </div>
    </div>
    <div class="body-container">
        <div class="left-contact-section">
            <h2>Send us a Message!</h2>
            <p>If you have any trouble, feel free to contact usLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
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