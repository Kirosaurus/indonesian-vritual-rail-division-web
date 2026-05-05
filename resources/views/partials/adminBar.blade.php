@php
    $currentUrl = request()->path();
    $links = [
        ['href' => '/admin/payware', 'label' => 'Payware', 'icon_active' => 'paywareOrange_icon.svg', 'icon' => 'paywareBlack_icon.svg'],
        ['href' => '/admin/freeware', 'label' => 'Freeware', 'icon_active' => 'freewareOrange_icon.svg', 'icon' => 'freewareBlack_icon.svg'],
        ['href' => '/admin/announcement', 'label' => 'Announcement', 'icon_active' => 'announcOrange_icon.svg', 'icon' => 'announceBlack_icon.svg'],
    ];
@endphp

<div class="admin-header">
    <a href="/" class="back-btn">Back to Site</a>
    <div class="header-center">
        <div class="search-card">
            <a href="/admin/payware"><img src="{{ asset('paywareOrange_icon.svg') }}" alt="Payware"
                    style="width: 40px; height: 40px;"></a>
            <a href="/admin/freeware"><img src="{{ asset('freewareOrange_icon.svg') }}" alt="Freeware"
                    style="width: 40px; height: 40px;"></a>
            <a href="/admin/announcement"><img src="{{ asset('announcOrange_icon.svg') }}" alt="Announcement"
                    style="width: 35px; height: 35px;"></a>

            <!-- <div class="search-icon">buat gambar</div>  -->
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