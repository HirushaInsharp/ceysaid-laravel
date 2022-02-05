@if (!empty($countries) && count($countries) > 0)
    <div class="featured-row">
        @foreach ($countries as $country)
            @php
                if (Storage::disk('public')->exists($country->featured_image_url)) {
                    $featuredImageUrl = asset('storage/' . $country->featured_image_url);
                } else {
                    $featuredImageUrl = asset('themes/images/deafult-image.jpg');
                }
            @endphp
            <div class="featured-item my-2 shadow">
                <a href="{{ route('country', [$country->slug]) }}">
                    <img src="{{ $featuredImageUrl }}" alt="{{ $country->name }}">
                    <div class="featured-item-content">
                        <span>
                            <i class="fas fa-map-marker-alt"></i>
                            {{ $country->name }}
                        </span>
                        <div>
                            <p class="text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dicta sed
                                dignissimos
                                libero soluta illum, harum amet excepturi sit?</p>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
@else
    <div style="text-align: center; font-size: 28px">Opps.... There are not any matching records</div>
@endif
