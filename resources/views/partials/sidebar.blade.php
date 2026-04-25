{{-- partials/sidebar.blade.php --}}

@php
$currentUrl = request()->path();
$links = [
['href' => '', 'label' => 'Dashboard', 'icon_active' => 'dashboard_icon.svg', 'icon' => 'dashboardWhite_icon.svg'],
['href' => 'payware', 'label' => 'Payware', 'icon_active' => 'paywareBlack_icon.svg', 'icon' => 'paywareWhite_icon.svg'],
['href' => 'freeware', 'label' => 'Freeware', 'icon_active' => 'freewareBlack_icon.svg','icon' => 'freewareWhite_icon.svg'],
['href' => 'terms&condition','label' => 'Terms & Condition','icon_active' => 'tncBlack_icon.svg', 'icon' => 'tncWhite_icon.svg'],
['href' => 'contact', 'label' => 'Contact', 'icon_active' => 'contactBlack_icon.svg', 'icon' => 'contactWhite_icon.svg'],
['href' => 'how2order', 'label' => 'How to Order', 'icon_active' => 'h2oBlack_icon.svg', 'icon' => 'h2oWhite_icon.svg'],
['href' => 'FAQ', 'label' => 'FAQ', 'icon_active' => 'faqBlack_icon.svg', 'icon' => 'faqWhite_icon.svg'],
];
@endphp

<aside class="sidebar">
    {{-- Checkboard overlay texture --}}
    <img src="{{ asset('checkboardDashboard.jpg') }}" alt="" class="sidebar-overlay" />

    <nav class="nav-list">
        <div class="navbar">
            {{-- Logo --}}
            <img src="{{ asset('LOGO.png') }}" alt="IVRD Logo" width="206" height="62" />

            {{-- Navigation links --}}
            <ul class="list-navbar">
                @foreach ($links as $link)
                @php
                $isActive = $currentUrl === $link['href']
                || $currentUrl === '/' . $link['href'];
                @endphp
                <a href="{{ url($link['href']) }}"
                    class="{{ $isActive ? 'icons-active' : 'icons' }}">
                    <img
                        src="{{ asset($isActive ? $link['icon_active'] : $link['icon']) }}"
                        alt="{{ $link['label'] }} Icon"
                        width="30"
                        height="30" />
                    {{ $link['label'] }}
                </a>
                @endforeach
            </ul>
        </div>
    </nav>

    {{-- Bottom social media --}}
    <div class="sidebar-bottom">
        <span>Social Media :</span>
        <div class="facebook-name">
            <a href="https://www.facebook.com/share/17tHYNhMne/" target="_blank" rel="noopener">
                <img class="facebook-logo"
                    src="{{ asset('facebook_icon.svg') }}"
                    alt="Facebook"
                    width="30" height="30" />
            </a>
            <a href="https://www.facebook.com/share/17tHYNhMne/" target="_blank" rel="noopener">
                Indonesia Virtual<br>Railway Division
            </a>
        </div>
        <span class="copyright-sign">© IVRD Copyright 2026</span>
    </div>
</aside>