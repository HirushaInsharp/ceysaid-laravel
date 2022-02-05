@extends('themes.website.layouts.home')
@section('content')
    <!-- featured section -->
    <section id="featured" class="py-4">
        <div class="container">
            <div class="row" style="margin-top: 10px; margin-bottom: 2rem; margin-right: 0rem">
                <div class="col-md-12">
                    <div class="input-wrapper">
                        <input type="text" class="search-box" id="search-box" placeholder="Search country">
                        <span class="fa fa-close close-btn" id="close-btn"></span>
                    </div>
                </div>
            </div>
            <div id="country-list">
            </div>
        </div>
        </div>
    </section>
    <!-- end of featured section -->

    @push('js')
        <script>
            $(document).ready(function() {
                getCountryList();

                $('#search-box').on('keyup', function() {
                    if ($(this).val().length > 0) {
                        $('#close-btn').addClass('show-close-btn');
                    } else {
                        $('#close-btn').removeClass('show-close-btn');
                    }

                    getCountryList($(this).val());
                });

                $('#close-btn').on('click', function() {
                    $('#search-box').val('');
                    $('#close-btn').removeClass('show-close-btn');
                    getCountryList($(this).val());
                });
            });

            function getCountryList(term) {
                $.ajax({
                    url: "{{ route('countries') }}",
                    data: {
                        term: term
                    },
                    success: function(data) {
                        $('#country-list').html(data);
                    }
                });
            }
        </script>
    @endpush
@stop
