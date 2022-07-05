@if (!empty($countries) && count($countries) > 0)
<div class="row">
        @foreach($countries as $country)

            @php
              if(isset($country->CountryMedia[0]))
              {
                if (Storage::disk('public')->exists($country->CountryMedia[0]->image_path)) {
                    $featuredImageUrl = asset('storage/' . $country->CountryMedia[0]->image_path);
                } else {
                    $featuredImageUrl = asset('themes/images/deafult-image.jpg');
                }
              }else{
                $featuredImageUrl = asset('themes/images/deafult-image.jpg');
              }
                
            @endphp
          <div class="col-md-3 ftco-animate mb-4">
            <div class="project-destination">
              <a href="{{route('country', ['country_slug'=>$country->slug])}}" class="img" style="background-image:url({{ $featuredImageUrl }})">
                <div class="text">
                  <h3>{{$country->name}}</h3>
                  <span>{{count($country->tours)}} Tours</span>
                </div>
              </a>
            </div>
          </div>
        @endforeach

      </div>
@else
    <div style="text-align: center; font-size: 28px">Opps.... There are not any matching records</div>
@endif
