@extends('themes.website.layouts.home')
@section('content')
<!-- featured section -->
<section id="featured" class="py-4">
    <div class="container">
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
@stop