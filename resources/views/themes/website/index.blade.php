@extends('themes.website.layouts.home')
@section('content')
    <!-- featured section -->
    <section id="featured" class="py-4">
        <div class="container">
            <div class="title-wrap">
                <span class="sm-title">know about some places before your travel</span>
                <h2 class="lg-title">featured places</h2>
            </div>
            @include('themes.website.partials.country-item');
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
