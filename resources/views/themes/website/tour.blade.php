@extends('themes.website.layouts.home')
@section('content')

    @include('themes.website.partials.tour-slider')
    <!-- header -->
    <!-- about section -->
    <section id="overview" class="py-4">
        <div class="container">
            <div class="title-wrap">
                <span class="sm-title">Overview</span>
            </div>

            <div id="tour-data">
                @php echo json_decode($tour->context); @endphp
            </div>
        </div>
    </section>
    <!-- end of about section -->

    <!-- DEtails section -->
    <section id="details" class="py-4">
        <div class="container">
            <div class="title-wrap">
                <span class="sm-title">Details</span>
            </div>
            <div class="row" style="text-align: center">
                <div class="col-md-4">
                    <p><i class="fa fa-plane" aria-hidden="true"></i> Start : {{ $tour->start_place }}</p>
                    <p><i class="fa fa-calendar" aria-hidden="true"></i> Date:
                        {{ $tour->start_date ? date('d M Y', strtotime($tour->start_date)) : '-' }}</p>
                </div>
                <div class="col-md-2">
                    <p><i class="fa fa-plane" aria-hidden="true"></i> End : {{ $tour->end_place }}</p>
                    <p><i class="fa fa-calendar" aria-hidden="true"></i> Date:
                        {{ $tour->end_date ? date('d M Y', strtotime($tour->end_date)) : '-' }}</p>
                </div>
                <div class="col-md-4">
                    <p style="width: 100%"><i class="fa fa-users" aria-hidden="true"></i> Max People :
                        {{ $tour->max_ppl }}</p>
                    <p><i class="fa fa-user" aria-hidden="true"></i> Min Age : {{ $tour->min_age }}</p>
                </div>
            </div>
        </div>
    </section>
    <!-- end of Details section -->
    <!-- Include section -->
    <section id="include" class="py-4">
        <div class="container">
            <div class="title-wrap">
                <span class="sm-title">Price Includes</span>
            </div>
            @php
                $tourGroups = $tour->getTourInclude();
            @endphp
            @include('themes.website.partials.include-exclude');
        </div>
    </section>
    <!-- end of include section -->
    <!-- Exlude section -->
    <section id="exclude" class="py-4">
        <div class="container">
            <div class="title-wrap">
                <span class="sm-title">Price Excludes</span>
            </div>
            @php
                $tourGroups = $tour->getTourExclude();
            @endphp
            @include('themes.website.partials.include-exclude');
        </div>
    </section>
    <!-- end of Exlude section -->
    <!-- timeline section -->
    <section id="timeLine" class="py-4">
        <h1
            style="	color:#333;font-weight:700;margin-top:125px;text-align:center;                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               text-transform:uppercase;letter-spacing:4px;line-height:23px;">
            Time Line
        </h1>
        <br>
        <div class="process-wrapper">
            <div id="progress-bar-container">
                @php
                    $tourDayCount = $tour->tourDays->count();
                    $width = '100%';

                    if ($tourDayCount != 0) {
                        $width = 100 / $tourDayCount . '%';
                    }
                @endphp
                <ul>
                    @foreach ($tour->tourDays as $day)
                        <li class="step step-item @if ($loop->iteration == 1) active @endif" data-id="{{ $loop->iteration }}"
                            style="width: {{ $width }}">
                            <div class="step-inner">Day {{ sprintf('%02s', $loop->iteration) }}</div>
                        </li>
                    @endforeach
                </ul>

                <div id="line">
                    <div id="line-progress"></div>
                </div>
            </div>

            <div id="progress-content-section">
                <input type="hidden" id="days_count" value="{{ $tourDayCount }}" />
                @foreach ($tour->tourDays as $day)
                    <div class="section-content step-content-{{ $loop->iteration }} @if ($loop->iteration == 1) active @endif">
                        <h2>{{ $day->title }}</h2>
                        <p>{!! $day->description !!}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- end of time line section -->


    <!-- services section -->
    <section id="services" class="py-4">
        <div class="container">
            <div class="title-wrap">
                <span class="sm-title">know about services that we offer</span>
                <h2 class="lg-title">Inclutions</h2>
            </div>

            <div class="services-row">
                <div class="services-item">
                    <span class="services-icon">
                        <i class="fas fa-hotel"></i>
                    </span>
                    <h3>Luxurious Hotel</h3>
                    <p class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem quo, totam
                        repellat
                        velit, dignissimos sequi error a minima architecto fugit nisi dolorum repellendus?</p>
                    <!-- <a href = "#" class = "btn">Read more</a> -->
                </div>

                <div class="services-item">
                    <span class="services-icon">
                        <i class="fas fa-map-marked-alt"></i>
                    </span>
                    <h3>Trave Guide</h3>
                    <p class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem quo, totam
                        repellat
                        velit, dignissimos sequi error a minima architecto fugit nisi dolorum repellendus?</p>
                    <!-- <a href = "#" class = "btn">Read more</a> -->
                </div>

                <div class="services-item">
                    <span class="services-icon">
                        <i class="fas fa-money-bill"></i>
                    </span>
                    <h3>Suitable Price</h3>
                    <p class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem quo, totam
                        repellat
                        velit, dignissimos sequi error a minima architecto fugit nisi dolorum repellendus?</p>
                    <!-- <a href = "#" class = "btn">Read more</a> -->
                </div>
            </div>
        </div>
    </section>
    <!-- end of services section -->


    <!-- booknow section -->
    <section id="bookNow" class="py-4">
        <div class="container">
            <div class="title-wrap">
                <span class="sm-title">Book Now</span>
            </div>
            <div class="">
                <div class="sign-in-up-form">
                    <ul class="tab-group" style="    display: flex;justify-content: end;padding-left: 12%;">
                        <li class="tab active" style="width: 46%;"><a href="#login">Booking Form</a></li>
                        <li class="tab" style=" width: 46%;"><a href="#signup">Enquiry From</a></li>
                    </ul>

                    <div class="tab-content">
                        <div id="login">
                            <h1>Need A tour?<br />Book now!</h1>

                            <form action="/" method="post">
                                <div class="field-wrap">
                                    <label id="label_userEmail"><i class="fa fa-calendar"
                                            aria-hidden="true"></i></i></label>
                                    <input type="date" name="userEmail" id="userEmail" autocomplete="off" />
                                </div>

                                <div class="field-wrap">
                                    <label id="label_userPass"><i class="fa fa-bed" aria-hidden="true"></i></label>
                                    <input type="number" name="userPass" id="userPass" autocomplete="off" />
                                </div>

                                <button class="btn" style="    margin-left: 75%;" />Process</button>
                            </form>
                        </div>

                        <div id="signup">
                            <h1>Do you have a Enquiry<br />Let us Know!</h1>

                            <form method="post">
                                <div class="field-wrap">
                                    <label id="label_signupNickname">Your Name</label>
                                    <input type="text" name="signupNickname" id="signupNickname" autocomplete="off" />
                                </div>

                                <div class="field-wrap">
                                    <label id="label_signupEmail">Email Address</label>
                                    <input type="email" name="signupEmail" id="signupEmail" autocomplete="off" />
                                </div>

                                <div class="field-wrap">

                                    <textarea rows="4" cols="50"
                                        placeholder="">Your Enquiry
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    </textarea>
                                </div>


                                <button type="submit" class="btn" style="    margin-left: 75%;" />Submit
                                Enquiry</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- end of booknow section -->

    @push('js')
        <script>
            jQuery(document).ready(function($) {
                $(this).scrollTop(0);

                $('#menu-center a').on('click', function(e) {
                    e.preventDefault();
                    var section = $(this).data('id');
                    $('html, body').animate({
                        scrollTop: $("#" +
                            section).offset().top - 100
                    }, 500);
                });

                $('.tab a').on('click', function(e) {
                    e.preventDefault();
                    $(this).parent().addClass('active');
                    $(this).parent().siblings().removeClass('active');
                    target = $(this).attr('href');

                    $('.tab-content > div').not(target).hide();
                    $(target).fadeIn(600);
                });
                $(document).scroll(function() {
                    var y = $(this).scrollTop();
                    if (y > 390) {
                        $('.wrapper').fadeIn();
                        $('#tab_navigation').fadeIn();

                    } else {
                        $('.wrapper').fadeOut();
                        $('#tab_navigation').fadeOut();
                    }

                    if (y > 420) {
                        $('.menu').css('z-index', 999999);
                    } else {
                        $('.menu').css('z-index', 1);
                    }

                    var scrollPos = $(document).scrollTop() + 40;
                    $('#menu-center a').each(function() {
                        var currLink = $(this);
                        var href = currLink.data("id");
                        var refElement = $("#" + href);

                        if (refElement.position().top <= scrollPos + 120 && refElement.position().top +
                            refElement.height() > scrollPos + 0) {
                            $('#menu-center ul li').removeClass("active");
                            currLink.addClass("active");
                        } else {
                            currLink.removeClass("active");
                        }
                    });
                });
                var viewportWidth = $(window).width();
                var daysCount = $('#days_count').val();

                $(".step").click(function() {
                    $(this).addClass("active").prevAll().addClass("active");
                    $(this).nextAll().removeClass("active");
                });

                $(".step-item").click(function() {
                    var id = $(this).data('id');
                    var slotSize = 100 / (daysCount - 1);
                    var width = 0;

                    if (id == 1) {
                        width = 0;
                    } else if (id == daysCount) {
                        width = 100;
                    } else {
                        width = slotSize * (id - 1);
                    }

                    $("#line-progress").css("width", width + "%");
                    $('.step-content-' + id).addClass("active").siblings().removeClass("active");
                });
            });
        </script>
    @endpush
@stop
