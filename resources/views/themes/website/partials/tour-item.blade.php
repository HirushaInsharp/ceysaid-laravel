@if (!empty($tours) && count($tours) > 0)
    <div class="blog-row">
        @foreach ($tours as $tour)
            @php
                if (Storage::disk('public')->exists($tour->featured_image_url)) {
                    $featuredImageUrl = asset('storage/' . $tour->featured_image_url);
                } else {
                    $featuredImageUrl = asset('themes/images/deafult-image.jpg');
                }
            @endphp
            <div class="blog-item my-2 shadow">
                <div class="blog-item-top">
                    <img src="{{ $featuredImageUrl }}" alt="blog">
                    <span class="blog-date">{{ sprintf('%02s', $tour->days) }} Days</span>
                </div>
                <div class="blog-item-bottom">
                    <span>{{ $tour->getTourMainDestination() }}</span>
                    <a href="{{ route('tour', [$tour->country->slug, $tour->slug]) }}">{{ $tour->name }}</a>
                    <p class="text">{{ $tour->description }}</p>
                </div>
            </div>
        @endforeach
    </div>
@else
    <div style="text-align: center; font-size: 28px">Opps.... There are not any matching records</div>
@endif
