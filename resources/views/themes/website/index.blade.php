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

            @foreach ($contries as $contry)
                <div class="featured-item my-2 shadow">
                    <a href="gallery.html">
                        @if (count($contry->CountryMedia) == 0 )
                            <img src="{{ asset('themes/images/srilanka/galle.jpg') }}" alt="featured place">
                        @else
                            <img src="{{ asset($contry->CountryMedia[0]->image_path) }}" alt="featured place">
                        @endif
                        
                        <div class="featured-item-content">
                            <span>
                                <i class="fas fa-map-marker-alt"></i>
                                {{$contry->name}}
                            </span>
                            <div>
                                @if ($contry->description == null )
                                    <p class="text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dicta sed dignissimos libero soluta illum, harum amet excepturi sit?</p>
                                @else
                                <p class="text">{{$contry->description}}</p>
                                @endif
                            </div>
                        </div>
                    </a>
                </div>     
            @endforeach
                   
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