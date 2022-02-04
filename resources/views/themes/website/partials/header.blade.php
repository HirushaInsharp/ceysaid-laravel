<!-- header -->
@php
$currentRouteName = \Request::route()->getName();
@endphp
<header class="flex @if($currentRouteName != 'home') header-sm @endif">
    <div class="container">
        <div class="header-title">
            <h1>{{ $page_title ?? ''}}</h1>
            <p>{{ $page_description ?? ''}}</p>
        </div>
    </div>
</header>
<!-- header -->
