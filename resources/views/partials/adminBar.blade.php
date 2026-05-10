@php
$currentUrl = request()->path();
$links = [
['href' => '/admin/products', 'label' => 'Payware', 'icon_active' => 'productDashboardOrange_icon.svg', 'icon' => 'productDashboardBlack_icon.svg'],
['href' => '/admin/announcements', 'label' => 'Announcement', 'icon_active' => 'announceOrange_icon.svg', 'icon' => 'announceBlack_icon.svg'],
['href' => '/admin/users', 'label' => 'User', 'icon_active' => 'userOrange_icon.svg', 'icon' => 'userBlack_icon.svg'],
['href' => '/admin/categories', 'label' => 'Categories', 'icon_active' => 'categoryOrange_icon.svg', 'icon' => 'categoryBlack_icon.svg'],
['href' => '/admin/tags', 'label' => 'Tags', 'icon_active' => 'tagOrange_icon.svg', 'icon' => 'tagBlack_icon.svg'],
];
@endphp

<div class="admin-header-wrapper">
    <div class="admin-header">
        <a href="/" class="back-btn">
            <img class="back-img" src="{{asset('back_icon.svg')}}">
            <span class="back-text">Back to Site</span>
        </a>
        <div class="header-center">
            <div class="search-card">
                <!-- Desktop: Tampilkan semua icons -->
                <div class="navbar-icons-desktop">
                    @foreach ($links as $link)
                    @php
                    $isActive = $currentUrl === ltrim($link['href'], '/');
                    @endphp
                    <a href="{{ url($link['href']) }}" class="header-icon" title="{{ $link['label'] }}">
                        <img src="{{ asset($isActive ? $link['icon_active'] : $link['icon']) }}" alt="{{ $link['label'] }} Icon"
                            width="30" height="30" />
                    </a>
                    @endforeach
                </div>

                <!-- Mobile: Menu toggle button -->
                <button class="navbar-menu-toggle" id="navMenuToggle">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="1"></circle>
                        <circle cx="19" cy="12" r="1"></circle>
                        <circle cx="5" cy="12" r="1"></circle>
                    </svg>
                </button>

                <!-- Mobile: Dropdown Menu -->
                <div class="navbar-menu-dropdown" id="navMenuDropdown">
                    @foreach ($links as $link)
                    @php
                    $isActive = $currentUrl === ltrim($link['href'], '/');
                    @endphp
                    <a
                        href="{{ url($link['href']) }}"
                        class="{{$isActive ? 'dropdown-item-active' : 'dropdown-item'}}">
                        <img src="{{ asset($isActive ? $link['icon_active'] : $link['icon']) }}" alt="{{ $link['label'] }} Icon"
                            width="20" height="20" style="margin-right: 8px;" />
                        {{ $link['label'] }}
                    </a>
                    @endforeach
                </div>
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
</div>

<script>
    const backBtn = document.querySelector(".back-btn");
    backBtn.addEventListener('click', () => {

    })
</script>