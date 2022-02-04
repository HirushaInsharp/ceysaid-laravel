@extends('themes.website.layouts.home')
@section('content')
<!-- blog section -->
<section id="blog" class="py-4">
    <div class="container">
        <div class="title-wrap">
            <h2 class="sm-title">know the places in {{ $country->name }}</h2>
            <h3 class="lg-title">Tours in {{ $country->name }}</h3>
        </div>
        <div class="blog-row">
            @foreach ($tours as $tour)
                @php
                if (Storage::disk('public')->exists($tour->featured_image_url)) {
                    $featuredImageUrl = asset('storage/' . $tour->featured_image_url);
                } else {
                    $featuredImageUrl = asset('themes/images/deafult-image.jpg');
                }
                @endphp
                <div class="blog-item my-2 shadow">
                    <div class="blog-item-top">
                        <img src="{{ $featuredImageUrl }}" alt="blog">
                        <span class="blog-date">{{ sprintf("%02s", $tour->days) }} Days</span>
                    </div>
                    <div class="blog-item-bottom">
                        <span>{{ $tour->main_destinations }}</span>
                        <a href="{{ route('tour', [$country->slug, $tour->slug ])}}">{{ $tour->name }}</a>
                        <p class="text">{{ $tour->description }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!-- end of blog section -->
@stop
