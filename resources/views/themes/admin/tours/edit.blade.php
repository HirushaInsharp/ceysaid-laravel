@extends('themes.admin.layouts.admin')
@section('content')
<style>
    .note-toolbar {
        background: #8080801d !important;
    }

    .note-btn-group .note-btn {
        padding: 0.5rem 1.5rem;
        font-size: 0.7rem;
        line-height: 1;
        border-radius: 0.4285rem;
    }
</style>
@php
    $editType = old('edit_type');

    if (session()->has('edit_type')) {
        $editType = session()->get('edit_type');
    }
@endphp
<section id="basic-tabs-components">
    <div class="row">
        <div class="col-sm-12">
            <div class="card overflow-hidden">
                <div class="card-content">
                    <div class="card-body">
                        <ul class="nav nav-tabs nav-fill" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link @if(empty($editType) || $editType == 'info') active @endif" id="info-tab" data-toggle="tab" href="#info" aria-controls="info" role="tab" aria-selected="true">Basic Info</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link @if($editType == 'tour_days') active @endif" id="tour_days-tab" data-toggle="tab" href="#tour_days" aria-controls="tour_days" role="tab" aria-selected="false">Tour Days</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link @if($editType == 'context') active @endif" id="context-tab" data-toggle="tab" href="#context" aria-controls="context" role="tab" aria-selected="false">Context</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link @if($editType == 'media') active @endif" id="media-tab" data-toggle="tab" href="#media" aria-controls="media" role="tab" aria-selected="false">Media</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link @if($editType == 'seo') active @endif" id="seo-tab" data-toggle="tab" href="#seo" aria-controls="seo" role="tab" aria-selected="false">SEO</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link @if($editType == 'price') active @endif" id="price-tab" data-toggle="tab" href="#price" aria-controls="price" role="tab" aria-selected="false">Price</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane @if(empty($editType) || $editType == 'info') active @endif" id="info" aria-labelledby="info-tab" role="tabpanel">
                                <form method="POST" action="{{ route('admin.tours.update', [ $tour->id]) }}" class="form-horizontal" novalidate>
                                    @method('PUT')
                                    @csrf
                                    <input type="hidden" name="edit_type" value="info" />
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <select name="country_id" class="select2 form-control">
                                                    @foreach ($countries as $country)
                                                        <option value="{{ $country->id }}" @if($country->id == $tour->country_id) selected @endif>{{ $country->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <div class="controls">
                                                    <input type="text" name="name" value="{{ $tour->name }}" class="form-control" placeholder="Tour Name" required data-validation-required-message="This tour name field is required">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="controls">
                                                    <input type="text" name="slug" value="{{ $tour->slug }}" class="form-control" placeholder="Tour slug" required data-validation-required-message="This tour slug field is required">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="controls">
                                                    <input type="text" name="main_destinations" value="{{ $tour->main_destinations }}" class="form-control" placeholder="Tour main destinations" required data-validation-required-message="This tour main destinations field is required">
                                                </div>
                                                <label>Ex: Sigiriya,Minneriya</label>
                                            </div>
                                            <div class="form-group">
                                                <div class="controls">
                                                    <input type="number" name="days" value="{{ $tour->days }}" class="form-control" placeholder="# Days" min="1">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="controls">
                                                    <textarea name="description" class="form-control" id="label-textarea" rows="3" placeholder="Description">@php echo $tour->description @endphp</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                            <div class="tab-pane @if($editType == 'tour_days') active @endif" id="tour_days" role="tabpanel" aria-labelledby="tour_days-tab">
                                <form method="POST" action="{{ route('admin.tours.update', [ $tour->id]) }}" class="form-horizontal" novalidate>
                                    @method('PUT')
                                    @csrf
                                    <input type="hidden" name="edit_type" value="tour_days" />
                                    <div class="nav-vertical">
                                        <ul class="nav nav-tabs nav-left flex-column" role="tablist">
                                            @foreach ( $tour->tourDays as $touDay)
                                                <li class="nav-item">
                                                    <a class="nav-link @if($loop->first) active @endif" id="item-day-{{ $loop->iteration }}" data-toggle="tab" aria-controls="tabVerticalLeft1" href="#tab-day-{{ $loop->iteration }}" role="tab" aria-selected="true">
                                                        Day {{ $loop->iteration }}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                        <div class="tab-content">
                                            @foreach ( $tour->tourDays as $touDay)
                                                <div class="tab-pane @if($loop->first) active @endif" id="tab-day-{{ $loop->iteration }}" role="tabpanel" aria-labelledby="baseVerticalLeft-tab1">
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <input type="text" name="title[]" value="{{ $touDay->title }}" class="form-control" placeholder="Title">
                                                        </div>
                                                        <div class="form-group">
                                                            <textarea name="day_description[]" class="form-control" id="label-textarea" rows="10" placeholder="Description">@php echo $touDay->description @endphp</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                            <div class="tab-pane @if($editType == 'context') active @endif" id="context" role="tabpanel" aria-labelledby="context-tab">
                                <form method="POST" action="{{ route('admin.tours.update', [ $tour->id]) }}" class="form-horizontal" novalidate>
                                    @method('PUT')
                                    @csrf
                                    <input type="hidden" name="edit_type" value="context" />
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <textarea class="form-control" name="context" rows="5" id="context-note">{{ json_decode($tour->context) }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                            <div class="tab-pane @if($editType == 'featured' || $editType == 'background')) active @endif" id="media" aria-labelledby="media-tab" role="tabpanel">
                                <ul class="nav nav-tabs nav-fill" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link @if(empty($editType) || $editType == 'featured') active @endif" id="featured-tab" data-toggle="tab" href="#featured" aria-controls="featured" role="tab" aria-selected="true">Featured Image</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link @if($editType == 'background') active @endif" id="background-tab" data-toggle="tab" href="#background" aria-controls="background" role="tab" aria-selected="false">Background Image</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane @if(empty($editType) || $editType == 'featured') active @endif" id="featured" role="tabpanel" aria-labelledby="featured-tab">
                                        <form method="POST" action="{{ route('admin.tours.update', [ $tour->id]) }}" enctype="multipart/form-data">
                                            @method('PUT')
                                            @csrf
                                            <input type="hidden" name="edit_type" value="featured" />
                                            <input type="file" name="featured_image" />
                                            <button type="submit" class="btn btn-primary" id="featured-image-upload-btn">Upload</button>
                                        </form>
                                        @if(Storage::disk('public')->exists($tour->featured_image_url))
                                        <div class="row">
                                            <div class="col-md-12 mt-3">
                                                <img src="{{ asset('storage/' . $tour->featured_image_url) }}" style="width: 500px" />
                                            </div>
                                            <div class="col-md-12 mt-1">
                                                <form method="POST" action="{{ route('admin.tours.update', [ $tour->id]) }}">
                                                    @method('PUT')
                                                    @csrf
                                                    <input type="hidden" name="edit_type" value="featured" />
                                                    <input type="hidden" name="remove_featured_image" value="1" />
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                    <div class="tab-pane @if($editType == 'background') active @endif" id="background" role="tabpanel" aria-labelledby="background-tab">
                                        <form method="POST" action="{{ route('admin.tours.update', [ $tour->id]) }}" enctype="multipart/form-data">
                                            @method('PUT')
                                            @csrf
                                            <input type="hidden" name="edit_type" value="background" />
                                            <input type="file" name="background_image" />
                                            <button type="submit" class="btn btn-primary" id="background-image-upload-btn">Upload</button>
                                        </form>
                                        @if(Storage::disk('public')->exists($tour->background_image_url))
                                        <div class="row">
                                            <div class="col-md-12 mt-3">
                                                <img src="{{ asset('storage/' .$tour->background_image_url) }}" style="width: 500px"/>
                                            </div>
                                            <div class="col-md-12 mt-1">
                                                <form method="POST" action="{{ route('admin.tours.update', [ $tour->id]) }}">
                                                    @method('PUT')
                                                    @csrf
                                                    <input type="hidden" name="edit_type" value="background" />
                                                    <input type="hidden" name="remove_background_image" value="1" />
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane @if($editType == 'seo') active @endif" id="seo" role="tabpanel" aria-labelledby="seo-tab">
                                <form method="POST" action="{{ route('admin.tours.update', [ $tour->id]) }}" class="form-horizontal" novalidate>
                                    @method('PUT')
                                    @csrf
                                    <input type="hidden" name="edit_type" value="seo" />
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <textarea name="meta_keywords" class="form-control" id="label-textarea" rows="3" placeholder="Meta Keywords">@php echo $tour->meta_keywords @endphp</textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="controls">
                                                    <textarea name="meta_description" class="form-control" id="label-textarea" rows="3" placeholder="Meta Description">@php echo $tour->meta_description @endphp</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                            <div class="tab-pane @if($editType == 'price') active @endif" id="price" role="tabpanel" aria-labelledby="price-tab">
                                <form method="POST" action="{{ route('admin.tours.update', [ $tour->id]) }}" class="form-horizontal" novalidate>
                                    @method('PUT')
                                    @csrf
                                    <input type="hidden" name="edit_type" value="price" />
                                    @for ($i = 0; $i < count($tour::PRICE_CODES); $i++)
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <div class="controls">
                                                    {{ $tour::PRICE_CODES[$i] }}
                                                    <input type="hidden" name="price_id[]" value="{{ $tour->getPrice($tour::PRICE_CODES[$i])->id ?? null }}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="controls">
                                                    <input type="number" name="amount[]" step="0.01" value="{{ $tour->getPrice($tour::PRICE_CODES[$i])->amount ?? 0 }}" class="form-control" placeholder="price" min="0.01">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endfor
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@push('admin-js')
<script>
    $(document).ready(function() {
        $('#context-note').summernote({
            tabsize: 2,
            height: 600,
            toolbar: [
                ['style', ['style']],
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']],
                ['fontname', ['fontname']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
    });
</script>
@endpush
@stop
