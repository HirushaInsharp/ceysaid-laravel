@extends('themes.website.layouts.home')
@section('content')
    <section id="about" class="py-4">
        <div class="container">
            <div class="title-wrap">
                <span class="sm-title">things to know about us</span>
                <h2 class="lg-title">our story</h2>
            </div>

            <div class="row">
                <div class="col-md-12">
                    @php echo json_decode($page->context); @endphp
                </div>
            </div>
        </div>
    </section>
    <!-- testimonials section -->
    <section id="testimonials" class="py-4">
        <div class="container">
            <div class="title-wrap">
                <span class="sm-title">what our clients say about us</span>
                <h2 class="lg-title">testimonials</h2>
            </div>

            <div class="test-row">
                @foreach ($testimonials as $testimonial)
                    <div class="test-item">
                        <p class="text">@php
                            echo $testimonial->testimonial;
                        @endphp</p>
                        <div class="test-item-info">
                            <img src="{{ asset('themes/images/test-1.jpg') }}" alt="testimonial">
                            <div>
                                <h3>{{ $testimonial->name }}</h3>
                                <p class="text">{{ $testimonial->tour->name }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- end of testimonials section -->

    <!-- facts section -->
    <section id="facts" class="py-4 flex">
        <div class="container">
            <div class='title-wrap'>
                <span class="sm-title">know some facts about our agency</span>
                <h2 class="lg-title">fun facts</h2>
            </div>

            <div class="facts-row">
                <div class="facts-item">
                    <span class="fas fa-camera-retro facts-icon"></span>
                    <div class="facts-info">
                        <strong>1220</strong>
                        <p class="text">photos taken</p>
                    </div>
                </div>

                <div class="facts-item">
                    <span class="fas fa-umbrella-beach  facts-icon"></span>
                    <div class="facts-info">
                        <strong>450</strong>
                        <p class="text">beaches visited</p>
                    </div>
                </div>

                <div class="facts-item">
                    <span class="fas fa-mountain facts-icon"></span>
                    <div class="facts-info">
                        <strong>84</strong>
                        <p class="text">mountains climbed</p>
                    </div>
                </div>

                <div class="facts-item">
                    <span class="fas fa-ship facts-icon"></span>
                    <div class="facts-info">
                        <strong>120</strong>
                        <p class="text">cruises organized</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
