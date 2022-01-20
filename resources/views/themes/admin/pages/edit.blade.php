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
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link @if(empty($editType) || $editType == 'info') active @endif" id="info-tab" data-toggle="tab" href="#info" aria-controls="info" role="tab" aria-selected="true">Basic Info</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link @if($editType == 'context') active @endif" id="context-tab" data-toggle="tab" href="#context" aria-controls="context" role="tab" aria-selected="false">Context</a>
                            </li>
                            @if (false)
                            <li class="nav-item">
                                <a class="nav-link @if($editType == 'media') active @endif" id="media-tab" data-toggle="tab" href="#media" aria-controls="media" role="tab" aria-selected="false">Media</a>
                            </li>
                            @endif
                            <li class="nav-item">
                                <a class="nav-link @if($editType == 'seo') active @endif" id="seo-tab" data-toggle="tab" href="#seo" aria-controls="seo" role="tab" aria-selected="false">SEO</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane @if(empty($editType) || old($editType) == 'info') active @endif" id="info" aria-labelledby="info-tab" role="tabpanel">
                                <form method="POST" action="{{ route('admin.pages.update', [ $page->id]) }}" class="form-horizontal" novalidate>
                                    @method('PUT')
                                    @csrf
                                    <input type="hidden" name="edit_type" value="info" />
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <input type="text" name="name" value="{{ $page->name }}" class="form-control" placeholder="Page Name" required data-validation-required-message="This Page Name field is required">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="controls">
                                                    <input type="text" name="title" value="{{ $page->title }}" class="form-control" placeholder="Page Title">
                                                </div>
                                                <label>Customize your page name</label>
                                            </div>
                                            <div class="form-group">
                                                <div class="controls">
                                                    <textarea name="description" class="form-control" id="label-textarea" rows="3" placeholder="Description">@php echo $page->description @endphp</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                            <div class="tab-pane @if($editType == 'context') active @endif" id="context" role="tabpanel" aria-labelledby="context-tab">
                                <form method="POST" action="{{ route('admin.pages.update', [ $page->id]) }}" class="form-horizontal" novalidate>
                                    @method('PUT')
                                    @csrf
                                    <input type="hidden" name="edit_type" value="context" />
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <textarea class="form-control" name="context" rows="5" id="context-note">{{ json_decode($page->context) }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                            @if (false)
                            <div class="tab-pane @if($editType == 'featured' || $editType == 'background')) active @endif" id="media" aria-labelledby="media-tab" role="tabpanel">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link @if(empty($editType) || $editType == 'featured') active @endif" id="featured-tab" data-toggle="tab" href="#featured" aria-controls="featured" role="tab" aria-selected="true">Featured Image</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link @if($editType == 'background') active @endif" id="background-tab" data-toggle="tab" href="#background" aria-controls="background" role="tab" aria-selected="false">Background Image</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane @if(empty($editType) || $editType == 'featured') active @endif" id="featured" role="tabpanel" aria-labelledby="featured-tab">
                                        <form method="POST" action="{{ route('admin.p.update', [ $page->id]) }}" enctype="multipart/form-data">
                                            @method('PUT')
                                            @csrf
                                            <input type="hidden" name="edit_type" value="featured" />
                                            <input type="file" name="featured_image" />
                                            <button type="submit" class="btn btn-primary" id="featured-image-upload-btn">Upload</button>
                                        </form>
                                        @if(Storage::disk('public')->exists($page->featured_image_url))
                                        <div class="row">
                                            <div class="col-md-12 mt-3">
                                                <img src="{{ asset('storage/' .$page->featured_image_url) }}" style="width: 500px" />
                                            </div>
                                            <div class="col-md-12 mt-1">
                                                <form method="POST" action="{{ route('admin.countries.update', [ $page->id]) }}">
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
                                        <form method="POST" action="{{ route('admin.countries.update', [ $page->id]) }}" enctype="multipart/form-data">
                                            @method('PUT')
                                            @csrf
                                            <input type="hidden" name="edit_type" value="background" />
                                            <input type="file" name="background_image" />
                                            <button type="submit" class="btn btn-primary" id="background-image-upload-btn">Upload</button>
                                        </form>
                                        @if(Storage::disk('public')->exists($page->background_image_url))
                                        <div class="row">
                                            <div class="col-md-12 mt-3">
                                                <img src="{{ asset('storage/' .$page->background_image_url) }}" style="width: 500px"/>
                                            </div>
                                            <div class="col-md-12 mt-1">
                                                <form method="POST" action="{{ route('admin.countries.update', [ $page->id]) }}">
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
                            @endif
                            <div class="tab-pane @if($editType == 'seo') active @endif" id="seo" role="tabpanel" aria-labelledby="seo-tab">
                                <form method="POST" action="{{ route('admin.pages.update', [ $page->id]) }}" class="form-horizontal" novalidate>
                                    @method('PUT')
                                    @csrf
                                    <input type="hidden" name="edit_type" value="seo" />
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <textarea name="meta_keywords" class="form-control" id="label-textarea" rows="3" placeholder="Meta Keywords">@php echo $page->meta_keywords @endphp</textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="controls">
                                                    <textarea name="meta_description" class="form-control" id="label-textarea" rows="3" placeholder="Meta Description">@php echo $page->meta_description @endphp</textarea>
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
