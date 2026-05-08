@php
    $currentUrl = request()->path();
    $links = [
        ['href' => '/admin/payware', 'label' => 'Payware', 'icon_active' => 'paywareOrange_icon.svg', 'icon' => 'paywareBlack_icon.svg'],
        ['href' => '/admin/freeware', 'label' => 'Freeware', 'icon_active' => 'freewareOrange_icon.svg', 'icon' => 'freewareBlack_icon.svg'],
        ['href' => '/admin/announcement', 'label' => 'Announcement', 'icon_active' => 'announceOrange_icon.svg', 'icon' => 'announceBlack_icon.svg'],
    ];
@endphp

<div class="admin-header">
    <a href="/" class="back-btn">Back to Site</a>
    <div class="header-center">
        <div class="search-card">
            @foreach ($links as $link)
                @php
                $isActive = $currentUrl === ltrim($link['href'], '/');
                @endphp
                <a href="{{ url($link['href']) }}"
                    class="header-icon">
                    <img
                        src="{{ asset($isActive ? $link['icon_active'] : $link['icon']) }}"
                        alt="{{ $link['label'] }} Icon"
                        width="30"
                        height="30" />
                </a>
                @endforeach
        </div>
    </div>
    <div class="header-right">
        <div class="profile-card">
            <div class="profile-avatar"><img src="{{ asset('person_icon.svg') }}" alt="Announcement"
                    style="width: 24px; height: 25px;"></div>
            <div class="profile-info">
                <div class="name">{{ auth()->user()->name ?? 'Admin' }}</div>
                <div class="email">{{ auth()->user()->email ?? 'example@email.com' }}</div>
            </div>
        </div>
    </div>
</div>