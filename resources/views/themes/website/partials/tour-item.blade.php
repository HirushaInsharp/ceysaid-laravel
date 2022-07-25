@if (!empty($tours) && count($tours) > 0)
    <div class="row">
        @foreach($tours as $tour)

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
        <div class="col-md-4 ftco-animate">
            <div class="project-wrap">
                <a href="{{route('tour', ['country_slug'=>$tour->country->slug, 'tour_slug'=>$tour->slug])}}" class="img" style="background-image:url({{ $featuredImageUrl }})"></a>
                <div class="text p-4">
                    @if (isset($tour->tourPrice[0]))      
                        <span class="price">${{$tour->tourPrice[0]->amount}}/person</span> 
                    @endif
                    @if (count($tour->tourDays) != 0)      
                        <span class="days">{{count($tour->tourDays)}} Days Tour</span>
                    @endif
                    <h3><a href="#">{{$tour->name}}</a></h3>
                    <p class="location"><span class="ion-ios-map"></span> {{$tour->main_destinations}}</p>
                    <ul>
                        <li><i class="fa-solid fa-bowl-food mr-2"></i>2</li>
                        <li><i class="fa-solid fa-bed mr-2"></i>3</li>
                        <li><i class="fa-solid fa-umbrella-beach mr-2"></i>Near Beach</li>
                    </ul>
                </div>
            </div>
        </div>
        @endforeach


    </div>
@else
    <div style="text-align: center; font-size: 28px">Opps.... There are not any matching records</div>
@endif
