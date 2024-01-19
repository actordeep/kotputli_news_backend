@php

	$seo = DB::table('seos')->first();
    $websitesetting = DB::table('websitesettings')->first();

@endphp

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1 user-scalable=no"">
        <meta name="author" content="{{ $seo->meta_author }}">
        <meta name="keyword" content="{{ isset($__env->getSections()['meta_keyword']) ? $__env->getSections()['meta_keyword'] : $seo->meta_keyword }}">
        <meta name="google-verification" content="{{ $seo->google_verification }}">
       <meta name="description" content="@yield('meta_description'),{{$seo->meta_description}}">
       <title>{{ isset($__env->getSections()['meta_title']) ? $__env->getSections()['meta_title'] : $seo->meta_title }}</title>




        <link href="{{ asset('frontend/assets/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('frontend/assets/css/menu.css') }}" rel="stylesheet">
        <link href="{{ asset('frontend/assets/css/font-awesome.min.css') }}" rel="stylesheet">
        <link href="{{ asset('frontend/assets/css/font-awesome.css') }}" rel="stylesheet">
        <link href="{{ asset('frontend/assets/css/responsive.css') }}" rel="stylesheet">
        <link href="{{ asset('frontend/assets/css/owl.carousel.min.css') }}" rel="stylesheet">
        <link href="{{ asset('frontend/assets/style.css') }}" rel="stylesheet">
        <link rel="shortcut icon" href="{{ asset('backend/assets/images/favicon.png') }}" />
        <script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=60993d2f30ef9700113f713e&product=inline-share-buttons" async="async"></script>

<!--google adds start-->
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2972675998911168"
     crossorigin="anonymous"></script>
<!--google adds stop-->

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-JBWC6K639P"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-JBWC6K639P');
</script>
    </head>
    <body>
    
    @include('main.body.header')

    @yield('content')
	
    @include('main.body.footer')
	
	
		<script src="{{ asset('frontend/assets/js/jquery.min.js') }}"></script>
		<script src="{{ asset('frontend/assets/js/bootstrap.min.js') }}"></script>
		<script src="{{ asset('frontend/assets/js/main.js') }}"></script>
		<script src="{{ asset('frontend/assets/js/owl.carousel.min.js') }}"></script>
	</body>
</html> 