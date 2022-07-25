@extends('themes.website.layouts.home')
@section('content')

@php
	if(isset($tour->tourMedia[count($tour->tourMedia)-1]))
	{
		if (Storage::disk('public')->exists($tour->tourMedia[count($tour->tourMedia)-1]->image_path)) {
			$featuredImageUrl = asset('storage/' . $tour->tourMedia[count($tour->tourMedia)-1]->image_path);
		} else {
			$featuredImageUrl = asset('images/xdestination-1.jpg.pagespeed.ic.TPV5k5yhjl.webp');
		}
	}else{
		$featuredImageUrl = asset('images/xdestination-1.jpg.pagespeed.ic.TPV5k5yhjl.webp');
	}
    
@endphp

<div class="hero-wrap js-fullheight" style="background-image: url({{ $featuredImageUrl }})" data-stellar-background-ratio="0.5">
	<div class="overlay"></div>
	<div class="container">
		<div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center" data-scrollax-parent="true">
			<div class="col-md-9 text text-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
				<p class="caps" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Travel to the any corner of
					the world, without going around in circles</p>
				<h1 data-scrollax="properties: { translateY: '30%', opacity: 1.6 }" style="text-transform: capitalize;">{{$tour->name}}</h1>
			</div>
		</div>
	</div>
</div>
<section class="ftco-section ftco-no-pb ftco-no-pt">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="search-wrap-1 ftco-animate p-4">
            <form action="#" class="search-property-1">
              <div class="row">
                <div class="col-lg align-items-end">
                  <div class="form-group">
                    <label for="#">Check-in date</label>
                    <div class="form-field">
                      <div class="icon"><i class="fa-solid fa-calendar"></i></div>
                      <input type="text" class="form-control checkin_date" placeholder="Check In Date">
                    </div>
                  </div>
                </div>
                <div class="col-lg align-items-end">
                  <div class="form-group">
                    <label for="#">Check-out date</label>
                    <div class="form-field">
                      <div class="icon"><i class="fa-solid fa-calendar"></i></div>
                      <input type="text" class="form-control checkout_date" placeholder="Check Out Date">
                    </div>
                  </div>
                </div>
                <div class="col-lg align-items-end">
                  <div class="form-group">
                    <label for="#">How many</label>
                    <div class="form-field">
                      <div class="icon"><i class="fa-solid fa-calendar"></i></div>
                      <input type="number" class="form-control checkout_date" placeholder="2">
                    </div>
                  </div>
                </div>
               
                <div class="col-lg align-self-end">
                  <div class="form-group">
                    <div class="form-field">
                      <input type="submit" value="Contact" class="form-control btn btn-primary">
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
</section>

<section class="ftco-section services-section bg-light">
    <div class="container">
      <div class="row d-flex">
        <div class="col-md-6 order-md-last heading-section pl-md-5 ftco-animate">
          <h2 class="mb-4" style=" text-transform: uppercase;">{{$tour->name}}</h2>
          @if($tour->description == null || $tour->description == '')
            <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a
                paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
          @else
                <p>{{$tour->description}}</p>
          @endif
          
         
          
        </div>
        <div class="col-md-6">
          <div class="row">
            <div class="col-md-4 d-flex align-self-stretch ftco-animate">
              <div class="media block-6 services d-block">
                <div class="icon"><i class="fa-solid fa-plane-arrival fa-3x"></i></div>
                <div class="media-body">
                  <h3 class="heading mb-3">Start Place</h3>
                  <p>Trip start From {{$tour->start_place}}</p>
                </div>
              </div>
            </div>
            <div class="col-md-4 d-flex align-self-stretch ftco-animate">
              <div class="media block-6 services d-block">
                <div class="icon"><i class="fa-solid fa-plane-departure fa-3x"></i></div>
                <div class="media-body">
                  <h3 class="heading mb-3">End Place</h3>
                  <p>Trip End from {{$tour->end_place}}</p>
                </div>
              </div>
            </div>
            <div class="col-md-4 d-flex align-self-stretch ftco-animate">
              <div class="media block-6 services d-block">
                <div class="icon"><i class="fa-solid fa-people-line fa-3x"></i></div>
                <div class="media-body">
                  <h3 class="heading mb-3">People count</h3>
                  <p>For this trip only {{$tour->max_ppl}} people can participate</p>
                </div>
              </div>
            </div>
            <div class="col-md-4 d-flex align-self-stretch ftco-animate">
              <div class="media block-6 services d-block">
                <div class="icon"><i class="fa-solid fa-calendar-days fa-3x"></i></div>
                <div class="media-body">
                  <h3 class="heading mb-3">Start date</h3>
                  <p>Tour start in {{$tour->start_date}}</p>
                </div>
              </div>
            </div>
            <div class="col-md-4 d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services d-block">
                  <div class="icon"><i class="fa-solid fa-calendar-days fa-3x"></i></div>
                  <div class="media-body">
                    <h3 class="heading mb-3">End date</h3>
                    <p>Tour start in {{$tour->end_date}}</p>
                  </div>
                </div>
              </div>
            <div class="col-md-4 d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services d-block">
                  <div class="icon"><i class="fa-solid fa-user-shield fa-3x"></i></i></div>
                  <div class="media-body">
                    <h3 class="heading mb-3">Minimun Age</h3>
                    <p>Minimun age is {{$tour->min_age}}</p>
                  </div>
                </div>
            </div>

          </div>
        </div>
      </div>
    </div>
</section>
<section class="ftco-counter img" id="section-counter">
	<div class="container">
		<div class="row d-flex">
			<div class="col-md-6 d-flex">
				<div class="img d-flex align-self-stretch" style="background-image:url({{ asset('images/xabout.jpg.pagespeed.ic.diSXLeSU2a.webp') }}) "></div>
			</div>
			<div class="col-md-6 pl-md-5 py-5">
				<div class="row justify-content-start pb-3">
					<div class="col-md-12 heading-section ftco-animate">
						<h2 class="mb-4">Make Your Tour Memorable and Safe With Us</h2>
						<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the
							blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language
							ocean.</p>
					</div>
				</div>
				<!-- <div class="row">
					<div class="col-md-4 justify-content-center counter-wrap ftco-animate">
						<div class="block-18 text-center mb-4">
							<div class="text">
								<strong class="number" data-number="30">0</strong>
								<span>Successful Tours</span>
							</div>
						</div>
					</div>
					<div class="col-md-4 justify-content-center counter-wrap ftco-animate">
						<div class="block-18 text-center mb-4">
							<div class="text">
								<strong class="number" data-number="2000">0</strong>
								<span>Happy Tourist</span>
							</div>
						</div>
					</div>
					<div class="col-md-4 justify-content-center counter-wrap ftco-animate">
						<div class="block-18 text-center mb-4">
							<div class="text">
								<strong class="number" data-number="20">0</strong>
								<span>Place Explored</span>
							</div>
						</div>
					</div>
				</div> -->
			</div>
		</div>
	</div>
</section>

<section>
    <div >
        <h2>TIME LINE</h2>
            <div class="timeline"> 
            @foreach($tour->tourDays as $day)
                @php
                    $index = $loop->index + 1;
                    $new_index = $index%3;
                    if ($new_index == 0)
                        $new_index =3;
                   
                    
                @endphp
                <div class="timeline__event  animated fadeInUp delay-{{$new_index}}s timeline__event--type{{$new_index}}">
                    <div class="timeline__event__icon ">
                        <i class="lni-cake"></i>
                    </div>
                    <div class="timeline__event__date">
                        Day {{$day->day}}
                    </div>
                    <div class="timeline__event__content ">
                        @if($day->title == "" || $day->title == null)
                            <div class="timeline__event__title">
                                No information published
                            </div>
                        @else
                            <div class="timeline__event__title">
                                {{$day->title}}
                            </div>
                        @endif

                        @if($day->description == "" || $day->description == null)
                            <div class="timeline__event__description">
                                No description published for this day.
                            </div>
                        @else
                            <div class="timeline__event__description">
                                {{$day->description}}
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
            <!-- <div class="timeline__event animated fadeInUp delay-2s timeline__event--type2">
                <div class="timeline__event__icon">
                <i class="lni-burger"></i>

                </div>
                <div class="timeline__event__date">
                    Day-02
                </div>
                <div class="timeline__event__content">
                <div class="timeline__event__title">
                    SIGIRIYA/MINNERIYA/SIGIRIYA
                </div>
                <div class="timeline__event__description">
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Vel, nam! Nam eveniet ut aliquam ab asperiores, accusamus iure veniam corporis incidunt reprehenderit accusantium id aut architecto harum quidem dolorem in!</p>
                </div>
                </div>
            </div>
            <div class="timeline__event animated fadeInUp delay-1s timeline__event--type3">
                <div class="timeline__event__icon">
                <i class="lni-slim"></i>

                </div>
                <div class="timeline__event__date">
                Day-03
                </div>
                <div class="timeline__event__content">
                <div class="timeline__event__title">
                    SIGIRIYA/KANDY
                </div>
                <div class="timeline__event__description">
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Vel, nam! Nam eveniet ut aliquam ab asperiores, accusamus iure veniam corporis incidunt reprehenderit accusantium id aut architecto harum quidem dolorem in!</p>
                </div>

                </div>
            </div>
            <div class="timeline__event animated fadeInUp timeline__event--type1">
                <div class="timeline__event__icon">
                <i class="lni-cake"></i>

                </div>
                <div class="timeline__event__date">
                Day-04
                </div>
                <div class="timeline__event__content">
                <div class="timeline__event__title">
                    BENTOTA-BALAPITIYA-KOSGODA-BENTOTA
                </div>
                <div class="timeline__event__description">
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Vel, nam! Nam eveniet ut aliquam ab asperiores, accusamus iure veniam corporis incidunt reprehenderit accusantium id aut architecto harum quidem dolorem in!</p>
                </div>
                </div>
            </div>
            <div class="timeline__event animated fadeInUp timeline__event--type2">
                <div class="timeline__event__icon">
                <i class="lni-cake"></i>

                </div>
                <div class="timeline__event__date">
                Day-05
                </div>
                <div class="timeline__event__content">
                <div class="timeline__event__title">
                    BENTOTA-BALAPITIYA-KOSGODA-BENTOTA
                </div>
                <div class="timeline__event__description">
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Vel, nam! Nam eveniet ut aliquam ab asperiores, accusamus iure veniam corporis incidunt reprehenderit accusantium id aut architecto harum quidem dolorem in!</p>
                </div>
                </div>
            </div>
            <div class="timeline__event animated fadeInUp timeline__event--type3">
                <div class="timeline__event__icon">
                <i class="lni-cake"></i>

                </div>
                <div class="timeline__event__date">
                Day-07
                </div>
                <div class="timeline__event__content">
                <div class="timeline__event__title">
                    BENTOTA/COLOMBO
                </div>
                <div class="timeline__event__description">
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Vel, nam! Nam eveniet ut aliquam ab asperiores, accusamus iure veniam corporis incidunt reprehenderit accusantium id aut architecto harum quidem dolorem in!</p>
                </div>
                </div>
            </div> -->

            </div>
    </div>
</section>
@stop
