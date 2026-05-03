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
                <p><b>By purchasing game mod content from Indonesia <span>Virtual Railway Division</span> (IVRD), the buyer is considered to have <span>read, understood, and agreed</span> to the following terms:</p>
                
                <ul class="terms-list">
                    <li>The buyer <span>must</span> provide information that is <span>accurate, honest, and accountable</span> during the transaction process.</li>
                    <li>All purchases are final and cannot be refunded or exchanged, unless an error is made by IVRD.</li>
                    <li>Purchased mod content is for personal use only and may not be resold, shared, or distributed without official permission from IVRD.</li>
                    <li>The buyer is fully responsible for the use of mod content, including any risks that may affect the device or system used.</li>
                    <li>There is no age restriction for making a purchase, but the buyer is assumed to have the ability to understand and agree to these terms consciously.</li>
                    <li>The buyer is expected to act in good faith and respect trust by not misusing purchased content.</li>
                    <li>IVRD reserves the right to update, change, or adjust the content and these terms at any time without prior notice.</li>
                    <li>Any violation of these terms may result in restriction or termination of access to IVRD services.</li></b>
                </ul>

                <p><b>By continuing the transaction, the buyer is deemed to agree to all applicable terms and conditions.</b></p>
            </div>
        </div>
    </div>


@endsection