<!-- BEGIN META -->
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
<!-- END META -->

<!-- BEGIN STYLESHEETS -->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{asset('fonts/fontawesome/css/all.min.css')}}"/>
<link rel="stylesheet" type="text/css" href="{{asset('fonts/fontawesome/css/fontawesome.min.css')}}"/>
<!-- BEGIN: VENDOR CSS-->
<link rel="stylesheet" type="text/css" href="{{ asset('vendors/vendors.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('vendors/toastr/toastr.css') }}">
@yield('vendorCss')
<!-- END: VENDOR CSS-->
<!-- BEGIN: Page Level CSS-->
<link rel="stylesheet" type="text/css" href="{{asset('themes/vertical-dark-menu-template/materialize.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('themes/vertical-dark-menu-template/style.css')}}">
@yield('pageCss')
<!-- END STYLESHEETS -->
