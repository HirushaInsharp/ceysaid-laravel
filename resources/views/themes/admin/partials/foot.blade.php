<script src="{{ asset('admin-themes/js/base/vendors.min.js') }}"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
<script src="{{ asset('admin-themes/js/base/datatables.min.js') }}"></script>
<script src="{{ asset('admin-themes/js/base/datatables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('admin-themes/js/base/jqBootstrapValidation.js') }}"></script>
<script src="{{ asset('admin-themes/js/base/prism.min.js') }}"></script>
<script src="{{ asset('admin-themes/js/base/select2.full.min.js')}}"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="{{ asset('admin-themes/js/base/app-menu.js') }}"></script>
<script src="{{ asset('admin-themes/js/base/app.js') }}"></script>
<script src="{{ asset('admin-themes/js/base/components.js') }}"></script>
<!-- END: Theme JS-->

<script src="{{ asset('admin-themes/js/base/form-validation.js') }}"></script>

<script src="{{ asset('admin-themes/js/base/summernote.js') }}"></script>

<script>
    $(window).on('load', function(){
        // PAGE IS FULLY LOADED
        // FADE OUT YOUR OVERLAYING DIV
        $('#overlay').fadeOut();
    });
</script>
