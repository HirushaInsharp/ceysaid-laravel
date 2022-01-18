@if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <h4 class="alert-heading">Success</h4>
        <p class="mb-0">{{ session()->get('success') }}</p>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true"><i class="feather icon-x-circle"></i></span>
        </button>
    </div>
@endif
@if (session()->has('info'))
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        <h4 class="alert-heading">Info</h4>
        <p class="mb-0">{{ session()->get('info') }}</p>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true"><i class="feather icon-x-circle"></i></span>
        </button>
    </div>
@endif
@if (session()->has('warning'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <h4 class="alert-heading">Warning</h4>
        <p class="mb-0">{{ session()->get('warning') }}</p>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true"><i class="feather icon-x-circle"></i></span>
        </button>
    </div>
@endif
@if (session()->has('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <h4 class="alert-heading">Error</h4>
        <p class="mb-0">{{ session()->get('error') }}</p>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true"><i class="feather icon-x-circle"></i></span>
        </button>
    </div>
@endif

@if (session()->has('errors'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <h4 class="alert-heading">Error</h4>
        @foreach ($errors->all() as $error)
            <p class="mb-0">{{ $error }}</p>
        @endforeach
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true"><i class="feather icon-x-circle"></i></span>
        </button>
    </div>
@endif
