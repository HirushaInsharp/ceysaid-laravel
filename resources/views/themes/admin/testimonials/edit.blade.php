@extends('themes.admin.layouts.admin')
@section('content')
<section class="simple-validation">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.testimonials.update', [$testimonial->id]) }}" class="form-horizontal" novalidate>
                            @method('PUT')
                            <input type="hidden" name="edit_type" value="info" />
                            @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="controls">
                                            <input type="text" name="name" value="{{ $testimonial->name }}" class="form-control" placeholder="Name" required data-validation-required-message="This Name field is required">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="controls">
                                            <textarea name="testimonial" class="form-control" id="label-textarea" rows="3" placeholder="Testimonial">@php echo $testimonial->testimonial @endphp</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <select name="tour_id" class="select2 form-control">
                                            @foreach ($tours as $tour)
                                                <option value="{{ $tour->id }}" @if($testimonial->tour_id == $tour->id) selected @endif>{{ $tour->name }}</option>
                                            @endforeach
                                            <option value="100">Test Tour</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@push('admin-js')
    <script>
        $(document).ready(function () {
            $(".select2").select2({
                // the following code is used to disable x-scrollbar when click in select input and
                // take 100% width in responsive also
                dropdownAutoWidth: true,
                width: '100%'
            });
        });
    </script>
@endpush
@stop
