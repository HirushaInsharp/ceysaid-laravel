@extends('themes.admin.layouts.admin')
@section('content')
<section class="simple-validation">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.tours.store') }}" class="form-horizontal" novalidate>
                            @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <select name="country_id" class="select2 form-control">
                                            @foreach ($countries as $country)
                                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <div class="controls">
                                            <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Tour Name" required data-validation-required-message="This tour name field is required">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="controls">
                                            <input type="text" name="main_destinations" value="{{ old('main_destinations') }}" class="form-control" placeholder="Tour main destinations" required data-validation-required-message="This tour main destinations field is required">
                                        </div>
                                        <label>Ex: Sigiriya,Minneriya</label>
                                    </div>
                                    <div class="form-group">
                                        <div class="controls">
                                            <input type="number" name="days" value="{{ old('days') }}" class="form-control" placeholder="# Days" min="1">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="controls">
                                            <textarea name="description" class="form-control" id="label-textarea" rows="3" placeholder="Description">@php echo old('description') @endphp</textarea>
                                        </div>
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
