<meta charset="utf-8" />
<title>  {{$settings->app_name}} - @yield('title') </title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
<meta content="Themesbrand" name="author" />
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- App favicon -->
<link rel="shortcut icon" href="{{get_file($settings->favicon_logo)}}">

<!-- jsvectormap css -->
{{--<link href="{{url('assets')}}/dashboard/libs/jsvectormap/css/jsvectormap.min.css" rel="stylesheet" type="text/css" />--}}

<!--Swiper slider css-->
{{--<link href="{{url('assets')}}/dashboard/libs/swiper/swiper-bundle.min.css" rel="stylesheet" type="text/css" />--}}


<!-- Layout config Js -->
<script src="{{url('assets')}}/dashboard/js/layout.js"></script>
<!-- Bootstrap Css -->
<link href="{{url('assets')}}/dashboard/css/bootstrap-rtl.min.css" rel="stylesheet" type="text/css" />
<!-- Icons Css -->
<link href="{{url('assets')}}/dashboard/css/icons.min.css" rel="stylesheet" type="text/css" />
<!-- App Css-->
<link href="{{url('assets')}}/dashboard/css/app-rtl.min.css" rel="stylesheet" type="text/css" />
<!-- custom Css-->
<link href="{{url('assets')}}/dashboard/css/custom-rtl.min.css" rel="stylesheet" type="text/css" />


<link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css" rel="stylesheet" />

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />



@yield('css')
{{--include loader css--}}
@include('layouts.loader.loaderCss')
{{-- end include loader css--}}
