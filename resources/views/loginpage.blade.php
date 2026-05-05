@extends('layouts.login')

@section('title', 'Login Page')

@section('content')
<div class="main-login-page">
    <div class="login-content" style="display: flex; flex-direction: column;">
        <div class="login-container">
            <h2>Login</h2>
            <div class="greet">
                <p>Welcome glad you come back</p>
            </div>
            <form action="/login" class="login-form" method="POST">
                @csrf

                <div class="input-group">
                    <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="Enter your email address">
                    @error('email')
                    <p class="error-text">{{ $message }}</p>
                    @enderror
                </div>

                <div class="input-group">
                    <input type="password" id="password" name="password" placeholder="Enter your password">
                </div>

                <div class="login-button-container">
                    <button type="submit" class="login-button-submit">Log In</button>
                </div>
            </form>
            <p class="signup-link">Are you new? Let's <a href="/register">Sign up</a></p>
        </div>
        <h4>© IVRD Copyright 2026 | <a href="">About Us</a></h4>
    </div>
</div>
@endsection