@extends('themes.website.layouts.home')
@section('content')

<!-- about section -->
<section id="about" class="py-4">
    <div class="container">
        <div class="title-wrap">
            <span class="sm-title">Overview</span>
        </div>

        <div class="about-row">
            <div class="about-left my-2">
                <img src="{{ asset('themes/images/srilanka/shutterstock_1496315567.jpg') }}" alt="about img">
            </div>
            <div class="about-right">
                <h2>{{$tour->name}}</h2>
                <p class="text">{{$tour->description}}</p>
                
            </div>
        </div>
    </div>
</section>
<!-- end of about section -->

<!-- timeline section -->

<section>
    <h1 style="	color:#333;font-weight:700;margin-top:125px;text-align:center;
            text-transform:uppercase;letter-spacing:4px;line-height:23px;">Dates</h1>
    <br>
    <div class="process-wrapper">
        <div id="progress-bar-container">
            <ul>
                @foreach ($tourDays as $day )
                    @if ($loop->index == 0)
                        <li class="step active step0{{$loop->index+1}}">
                            <div class="step-inner">Day {{$day->day}}</div>
                        </li>
                    @else
                        <li class="step step0{{$loop->index+1}}">
                            <div class="step-inner">Day {{$day->day}}</div>
                        </li>
                    @endif
                    
                @endforeach                
            </ul>

            <div id="line">
                <div id="line-progress"></div>
            </div>
        </div>

        <div id="progress-content-section">
            @foreach ($tourDays as $day )
                @if ($loop->index == 0)
                    <div class="section-content st{{$loop->index+1}} active">
                        <h2>{{$day->title}}</h2>
                        <p>{{$day->description}}</p>
                    </div>
                @else 
                    <div class="section-content st{{$loop->index+1}}">
                        <h2>{{$day->title}}</h2>
                        <p>{{$day->description}}</p>
                    </div>
                @endif                
                
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
                <p class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem quo, totam repellat velit, dignissimos sequi error a minima architecto fugit nisi dolorum repellendus?</p>
                <!-- <a href = "#" class = "btn">Read more</a> -->
            </div>

            <div class="services-item">
                <span class="services-icon">
                    <i class="fas fa-map-marked-alt"></i>
                </span>
                <h3>Trave Guide</h3>
                <p class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem quo, totam repellat velit, dignissimos sequi error a minima architecto fugit nisi dolorum repellendus?</p>
                <!-- <a href = "#" class = "btn">Read more</a> -->
            </div>

            <div class="services-item">
                <span class="services-icon">
                    <i class="fas fa-money-bill"></i>
                </span>
                <h3>Suitable Price</h3>
                <p class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem quo, totam repellat velit, dignissimos sequi error a minima architecto fugit nisi dolorum repellendus?</p>
                <!-- <a href = "#" class = "btn">Read more</a> -->
            </div>
        </div>
    </div>
</section>
<!-- end of services section -->
@push('js')
<script>
    var tours = {!!$tourDays!!}
    console.log(tours.length)
    $(".step").click(function() {
        $(this).addClass("active").prevAll().addClass("active");
        $(this).nextAll().removeClass("active");
    });
    tours.forEach((tour, index) => {
        console.log(index)
        var loopIndex = index+1;
        if(loopIndex == 1){
            $(".step01").click(function() {
                $("#line-progress").css("width", "3%");
                $(".st1").addClass("active").siblings().removeClass("active");
            });
        }else{
            $(".step0"+loopIndex).click(function() {
                $("#line-progress").css("width", (100/(tours.length-1))* (loopIndex-1) +"%");
                $(".st"+loopIndex).addClass("active").siblings().removeClass("active");
            });
        }
    });
    

    // $(".step02").click(function() {
    //     $("#line-progress").css("width", "25%");
    //     $(".st2").addClass("active").siblings().removeClass("active");
    // });

    // $(".step03").click(function() {
    //     $("#line-progress").css("width", "50%");
    //     $(".st3").addClass("active").siblings().removeClass("active");
    // });

    // $(".step04").click(function() {
    //     $("#line-progress").css("width", "75%");
    //     $(".st4").addClass("active").siblings().removeClass("active");
    // });

    // $(".step05").click(function() {
    //     $("#line-progress").css("width", "100%");
    //     $(".st5").addClass("active").siblings().removeClass("active");
    // });
</script>
@endpush
@stop