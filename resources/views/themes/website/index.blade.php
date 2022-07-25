@extends('themes.website.layouts.home')
@section('content')


<div class="hero-wrap js-fullheight" style="background-image: url({{ asset('images/xbg_1.jpg.pagespeed.ic.CxKtYSNFRY.jpg') }})" data-stellar-background-ratio="0.5">
	<div class="overlay"></div>
	<div class="container">
		<div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center" data-scrollax-parent="true">
			<div class="col-md-9 text text-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
				<p class="caps" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Travel to the any corner of
					the world, without going around in circles</p>
				<h1 data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Make Your Tour Amazing With Us</h1>
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
									<label for="#">Destination</label>
									<div class="form-field">
										<div class="icon"><i class="fa-solid fa-magnifying-glass"></i></div>
										<input type="text" class="form-control" placeholder="Search place">
									</div>
								</div>
							</div>
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
									<label for="#">Price Limit</label>
									<div class="form-field">
										<div class="select-wrap">
											<div class="icon"><i class="fa-solid fa-angle-down"></i></span></div>
											<select name="" id="" class="form-control">
												<option value="" style="color: black;">$5,000</option>
												<option value="" style="color: black;">$10,000</option>
												<option value="" style="color: black;">$50,000</option>
												<option value="" style="color: black;">$100,000</option>
												<option value="" style="color: black;">$200,000</option>
												<option value="" style="color: black;">$300,000</option>
												<option value="" style="color: black;">$400,000</option>
												<option value="" style="color: black;">$500,000</option>
												<option value="" style="color: black;">$600,000</option>
												<option value="" style="color: black;">$700,000</option>
												<option value="" style="color: black;">$800,000</option>
												<option value="" style="color: black;">$900,000</option>
												<option value="" style="color: black;">$1,000,000</option>
												<option value="" style="color: black;">$2,000,000</option>
											</select>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg align-self-end">
								<div class="form-group">
									<div class="form-field">
										<input type="submit" value="Search" class="form-control btn btn-primary">
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
				<h2 class="mb-4">It's time to start your adventure</h2>
				<p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a
					paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
				<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the
					blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language
					ocean.
					A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
				<p><a href="#" class="btn btn-primary py-3 px-4">Search Destination</a></p>
			</div>
			<div class="col-md-6">
				<div class="row">
					<div class="col-md-6 d-flex align-self-stretch ftco-animate">
						<div class="media block-6 services d-block">
							<div class="icon"><i class="fa-solid fa-person-snowboarding fa-4x"></i></div>
							<div class="media-body">
								<h3 class="heading mb-3">Activities</h3>
								<p>A small river named Duden flows by their place and supplies it with the necessary</p>
							</div>
						</div>
					</div>
					<div class="col-md-6 d-flex align-self-stretch ftco-animate">
						<div class="media block-6 services d-block">
							<div class="icon"><i class="fa-solid fa-plane-departure fa-4x"></i></div>
							<div class="media-body">
								<h3 class="heading mb-3">Travel Arrangements</h3>
								<p>A small river named Duden flows by their place and supplies it with the necessary</p>
							</div>
						</div>
					</div>
					<div class="col-md-6 d-flex align-self-stretch ftco-animate">
						<div class="media block-6 services d-block">
							<div class="icon"><i class="fa-solid fa-person fa-4x"></i></div>
							<div class="media-body">
								<h3 class="heading mb-3">Private Guide</h3>
								<p>A small river named Duden flows by their place and supplies it with the necessary</p>
							</div>
						</div>
					</div>
					<div class="col-md-6 d-flex align-self-stretch ftco-animate">
						<div class="media block-6 services d-block">
							<div class="icon"><i class="fa-solid fa-map fa-4x"></i></div>
							<div class="media-body">
								<h3 class="heading mb-3">Location Manager</h3>
								<p>A small river named Duden flows by their place and supplies it with the necessary</p>
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
				</div> -->
			</div>
		</div>
	</div>
</section>
<section class="ftco-section">
	<div class="container">
		<div class="row justify-content-center pb-4">
			<div class="col-md-12 heading-section text-center ftco-animate">
				<h2 class="mb-4">Best Place Destination</h2>
			</div>
		</div>
		@include('themes.website.partials.country-item')
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