@extends('themes.admin.layouts.admin')
@section('content')
<section class="simple-validation">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.setting.post') }}" class="form-horizontal" novalidate>
                            @csrf
                            <div class="row">
                                @php
                                    $settings = config('setting');
                                @endphp
                                @foreach ($settings as $key => $value)
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-md-4">
                                                <span>{{ $value }}</span>
                                            </div>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control" name="{{ $key }}" value="{{ App\Models\Setting::getSetting($key) }}" placeholder="{{ $value }}">
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
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
