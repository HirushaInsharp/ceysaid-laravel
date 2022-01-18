@extends('themes.website.layouts.home')
@section('content')
<!-- featured section -->
<section id="featured" class="py-4">
    <div class="container">
        <div class="title-wrap">
            <span class="sm-title">know about some places before your travel</span>
            <h2 class="lg-title">featured places</h2>
        </div>

        <div class="featured-row">
            <div class="featured-item my-2 shadow">
                <a href="gallery.html">
                    <img src="{{ asset('themes/images/srilanka/shutterstock_232546966.jpg') }}" alt="featured place">
                    <div class="featured-item-content">
                        <span>
                            <i class="fas fa-map-marker-alt"></i>
                            Sri Lanka
                        </span>
                        <div>
                            <p class="text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dicta sed dignissimos libero soluta illum, harum amet excepturi sit?</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="featured-item my-2 shadow">
                <img src="{{ asset('themes/images/featured-north-bondi-australia.jpg') }}" alt="featured place">
                <div class="featured-item-content">
                    <span>
                        <i class="fas fa-map-marker-alt"></i>
                        North Bondi, Australia
                    </span>
                    <div>
                        <p class="text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dicta sed dignissimos libero soluta illum, harum amet excepturi sit?</p>
                    </div>
                </div>
            </div>

            <div class="featured-item my-2 shadow">
                <img src="{{ asset('themes/images/featured-berlin-germany.jpg') }}" alt="featured place">
                <div class="featured-item-content">
                    <span>
                        <i class="fas fa-map-marker-alt"></i>
                        Berlin, Germany
                    </span>
                    <div>
                        <p class="text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dicta sed dignissimos libero soluta illum, harum amet excepturi sit?</p>
                    </div>
                </div>
            </div>

            <div class="featured-item my-2 shadow">
                <img src="{{ asset('themes/images/featured-khwaeng-wat-arun-thailand.jpg') }}" alt="featured place">
                <div class="featured-item-content">
                    <span>
                        <i class="fas fa-map-marker-alt"></i>
                        Khwaeng wat arun, thailand
                    </span>
                    <div>
                        <p class="text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dicta sed dignissimos libero soluta illum, harum amet excepturi sit?</p>
                    </div>
                </div>
            </div>

            <div class="featured-item my-2 shadow">
                <img src="{{ asset('themes/images/featured-rome-italy.jpg') }}" alt="featured place">
                <div class="featured-item-content">
                    <span>
                        <i class="fas fa-map-marker-alt"></i>
                        Rome, Italy
                    </span>
                    <div>
                        <p class="text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dicta sed dignissimos libero soluta illum, harum amet excepturi sit?</p>
                    </div>
                </div>
            </div>

            <div class="featured-item my-2 shadow">
                <img src="{{ asset('themes/images/featured-fuvahmulah-maldives.jpg') }}" alt="featured place">
                <div class="featured-item-content">
                    <span>
                        <i class="fas fa-map-marker-alt"></i>
                        fuvahmulah, maldives
                    </span>
                    <div>
                        <p class="text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dicta sed dignissimos libero soluta illum, harum amet excepturi sit?</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end of featured section -->
<!-- video section -->
<section id="video">
    <div class="video-wrapper flex">
        <video loop>
            <source src="{{ asset('themes/videos/video-section.mp4') }}" type="video/mp4">
        </video>
        <button type="button" id="play-btn">
            <i class="fas fa-play"></i>
        </button>
    </div>
</section>
<!-- end of video section -->

@push('js')

<script>
    // play/pause video
    let video = document.querySelector('.video-wrapper video');
    document.getElementById('play-btn').addEventListener('click', () => {
        if (video.paused) {
            video.play();
        } else {
            video.pause();
        }
    });
</script>
@endpush
@stop