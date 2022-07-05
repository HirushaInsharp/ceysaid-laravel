@extends('themes.website.layouts.home')
@section('content')
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
@stop
