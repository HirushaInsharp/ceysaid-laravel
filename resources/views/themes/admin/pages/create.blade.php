@extends('themes.admin.layouts.admin')
@section('content')
<section class="simple-validation">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.pages.store') }}" class="form-horizontal" novalidate>
                            @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="controls">
                                            <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Page Name" required data-validation-required-message="This Page Name field is required">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="controls">
                                            <input type="text" name="title" value="{{ old('title') }}" class="form-control" placeholder="Page Title">
                                        </div>
                                        <label>Customize your page name</label>
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
@stop
