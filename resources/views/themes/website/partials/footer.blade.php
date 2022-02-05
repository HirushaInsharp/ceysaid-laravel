<footer class="py-4">
    <div class="container footer-row">
        <div class="footer-item">
            <a href="index.html" class="site-brand">
                CEY<span>S<span>A<span>I<span>D</span></span></span></span>
            </a>
            <p class="text">@php
                echo $company_description ?? '';
            @endphp</p>
        </div>

        <div class="footer-item">
            <h2>Follow us on: </h2>
            <ul class="social-links">

                @if (cache()->has('setting_facebook'))
                    <li>
                        <a href="{{ cache()->get('setting_facebook') }}">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                    </li>
                @endif
                @if (cache()->has('setting_instagram'))
                    <li>
                        <a href="{{ cache()->get('setting_instagram') }}">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </li>
                @endif
                @if (cache()->has('setting_twitter'))
                    <li>
                        <a href="{{ cache()->get('setting_twitter') }}">
                            <i class="fab fa-twitter"></i>
                        </a>
                    </li>
                @endif
            </ul>
        </div>

        <div class="footer-item">
            <h2>Popular Destinations:</h2>
            <ul>
                @php
                    $popularDestinations = popular_destination();
                @endphp

                @foreach ($popularDestinations as $destination)
                    <li><a href="{{ route('country', [$destination->slug]) }}">{{ $destination->name }}</a></li>
                @endforeach
            </ul>
        </div>

        <div class="subscribe-form footer-item">
            <h2>Subscribe for Newsletter!</h2>
            <form class="flex">
                <input type="email" id="subscribe-email" placeholder="Enter Email" class="form-control">
                <input type="button" class="btn" id="subscribe" value="Subscribe">
            </form>
        </div>
    </div>
</footer>

@push('js')
    <script>
        $(document).ready(function() {
            $('#subscribe').on('click', function() {
                $.ajax({
                    url: "{{ route('subscribe') }}",
                    type: "POST",
                    data: {
                        email: $('#subscribe-email').val(),
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    dataType: 'JSON',
                    success: function(data) {
                        $.toast({
                            heading: 'Success',
                            text: data.success,
                            showHideTransition: 'slide',
                            icon: 'success',
                            position: 'bottom-right',
                        });
                    },
                    error: function(data) {
                        var errors = data.responseJSON;
                        errorsHtml = "";

                        $.each(errors.errors, function(key, value) {
                            errorsHtml += value[0]; //showing only the first error.
                        });

                        if (!errorsHtml) {
                            errorsHtml = "There is someting wrong"
                        };

                        $.toast({
                            heading: 'Error',
                            text: errorsHtml,
                            showHideTransition: 'slide',
                            icon: 'error',
                            position: 'bottom-right',
                        });
                    }
                });
            });
        });
    </script>
@endpush
