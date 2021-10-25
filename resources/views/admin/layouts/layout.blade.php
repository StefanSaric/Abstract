<!DOCTYPE html>
<html class="loading"
  lang="@if(session()->has('locale')){{session()->get('locale')}}@else{{'en'}}@endif"
  data-textdirection="ltr">
<head>
    <title>Abstract</title>

    @include('admin.layouts.head')
    
</head>
<body>
    <!-- BEGIN HEADER-->
    @include('admin.layouts.header')
    <!-- END HEADER-->
    <!-- BEGIN SIDEBAR-->
    @include('admin.layouts.sidebar')
    <!-- END SIDEBAR-->

    <!-- BEGIN BASE-->
    <div id="main">
        <!-- BEGIN CONTENT-->
        @yield('content')
        <!-- END CONTENT -->
    </div>
    <!-- END BASE -->
    @include('admin.layouts.scripts')
</body>
</html>