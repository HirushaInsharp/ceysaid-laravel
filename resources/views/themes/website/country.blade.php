@extends('themes.website.layouts.home')
@section('content')


<section class="ftco-counter img" id="section-counter">
        @php
              if(isset($country->CountryMedia[0]))
              {
                if (Storage::disk('public')->exists($country->CountryMedia[0]->image_path)) {
                    $featuredImageUrl = asset('storage/' . $country->CountryMedia[0]->image_path);
                } else {
                    $featuredImageUrl = asset('images/xabout.jpg.pagespeed.ic.diSXLeSU2a.webp');
                }
              }else{
                $featuredImageUrl = asset('images/xabout.jpg.pagespeed.ic.diSXLeSU2a.webp');
              }
                
            @endphp
	<div class="container">
		<div class="row d-flex">
			<div class="col-md-6 d-flex">
				<div class="img d-flex align-self-stretch" style="background-image:url({{ $featuredImageUrl }}) "></div>
			</div>
			<div class="col-md-6 pl-md-5 py-5">
				<div class="row justify-content-start pb-3">
					<div class="col-md-12 heading-section ftco-animate">
						<h2 class="mb-4">{{$country->name}}</h2>
                        @if($country->description == '' || $country->description == null )
						<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the
							blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language
							ocean.</p>
                        @else
                        <p>{{$country->description}}</p>
                        @endif
					</div>
				</div>
				<div class="row">
					<div class="col-md-4 justify-content-center counter-wrap ftco-animate">
						<div class="block-18 text-center mb-4">
							<div class="text">
								<strong class="number" data-number="300">0</strong>
								<span>Successful Tours</span>
							</div>
						</div>
					</div>
					<div class="col-md-4 justify-content-center counter-wrap ftco-animate">
						<div class="block-18 text-center mb-4">
							<div class="text">
								<strong class="number" data-number="24000">0</strong>
								<span>Happy Tourist</span>
							</div>
						</div>
					</div>
					<div class="col-md-4 justify-content-center counter-wrap ftco-animate">
						<div class="block-18 text-center mb-4">
							<div class="text">
								<strong class="number" data-number="200">0</strong>
								<span>Place Explored</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="ftco-section ftco-no-pt">
	<div class="container">
		<div class="row justify-content-center pb-4">
			<div class="col-md-12 heading-section text-center ftco-animate">
				<h2 class="mb-4">Tour Destination</h2>
			</div>
		</div>
		@include('themes.website.partials.tour-item')
	</div>
</section>
@stop
