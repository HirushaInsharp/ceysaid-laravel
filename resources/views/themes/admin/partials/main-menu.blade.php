<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto"><a class="navbar-brand" href="../../../html/ltr/vertical-menu-template/index.html">
                   <!-- <div class="brand-logo"></div> -->
                    <h2 class="brand-text mb-0">Ceysaid</h2>
                </a></li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary" data-ticon="icon-disc"></i></a></li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    @php
        $currentRouteName = \Request::route()->getName();
    @endphp
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" nav-item"><a href="index.html"><i class="feather icon-home"></i><span class="menu-title" data-i18n="Dashboard">Dashboard</span><span class="badge badge badge-warning badge-pill float-right mr-2">2</span></a>
                <ul class="menu-content">
                    <li class=""><a href="dashboard-analytics.html"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Analytics">Analytics</span></a>
                    </li>
                    <li><a href="dashboard-ecommerce.html"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="eCommerce">eCommerce</span></a>
                    </li>
                </ul>
            </li>
            <li class="nav-item @if(Str::contains($currentRouteName, 'admin.pages.')) active @endif">
                <a href="{{ route('admin.pages.index') }}"><i class="feather icon-file-text"></i><span class="menu-title">Pages</span></a>
            </li>
            <li class=" navigation-header"><span>Tour Management</span>
            </li>
            <li class="nav-item @if(Str::contains($currentRouteName, 'admin.countries.')) active @endif">
                <a href="{{ route('admin.countries.index') }}"><i class="feather icon-globe"></i><span class="menu-title">Countries</span></a>
            </li>
            <li class="nav-item @if(Str::contains($currentRouteName, 'admin.tours.')) active @endif">
                <a href="{{ route('admin.tours.index') }}"><i class="feather icon-map-pin"></i><span class="menu-title">Tours</span></a>
            </li>
            <li class="nav-item @if(Str::contains($currentRouteName, 'admin.testimonials.')) active @endif">
                <a href="{{ route('admin.testimonials.index') }}"><i class="feather icon-message-square"></i><span class="menu-title">Testimonials</span></a>
            </li>
            <li class=" navigation-header"><span>Settings</span>
            </li>
            <li class="nav-item @if(Str::contains($currentRouteName, 'admin.setting.')) active @endif">
                <a href="{{ route('admin.setting') }}"><i class="feather icon-settings"></i><span class="menu-title">Setting</span></a>
            </li>
        </ul>
    </div>
</div>
