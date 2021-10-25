<!-- BEGIN VENDOR SCRIPTS -->
<script src="{{ asset('js/vendors.min.js') }}"></script>
<script src="{{ asset('fonts/fontawesome/js/all.min.js') }}"></script>
<script src="{{ asset('fonts/fontawesome/js/fontawesome.min.js') }}"></script>
@yield('vendorScripts')
<script src="{{ asset('vendors/toastr/toastr.min.js') }}"></script>
<!-- END VENDOR SCRIPTS -->
<!-- BEGIN PAGE SCRIPTS -->
<script src="{{ asset('/js/plugins.js') }}"></script>
<script src="{{ asset('/js/notifications.js') }}"></script>
@yield('pageScripts')
<!-- END PAGE SCRIPTS -->
