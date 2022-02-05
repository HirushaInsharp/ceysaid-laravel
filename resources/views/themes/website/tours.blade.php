@extends('themes.website.layouts.home')
@section('content')
    <section id="blog" class="py-4">
        <div class="container">
            <div class="row" style="margin-top: 10px; margin-bottom: 2rem; margin-right: 0rem">
                <div class="col-md-12">
                    <div class="input-wrapper">
                        <input type="text" class="search-box" id="search-box" placeholder="Search tour">
                        <span class="fa fa-close close-btn" id="close-btn"></span>
                    </div>
                </div>
            </div>
            <div id="tour-list">
            </div>
        </div>
    </section>
    @push('js')
        <script>
            $(document).ready(function() {
                getTourList();

                $('#search-box').on('keyup', function() {
                    if ($(this).val().length > 0) {
                        $('#close-btn').addClass('show-close-btn');
                    } else {
                        $('#close-btn').removeClass('show-close-btn');
                    }

                    getTourList($(this).val());
                });

                $('#close-btn').on('click', function() {
                    $('#search-box').val('');
                    $('#close-btn').removeClass('show-close-btn');
                    getTourList($(this).val());
                });
            });

            function getTourList(term) {
                $.ajax({
                    url: "{{ route('tours') }}",
                    data: {
                        term: term
                    },
                    success: function(data) {
                        $('#tour-list').html(data);
                    }
                });
            }
        </script>
    @endpush

@stop
