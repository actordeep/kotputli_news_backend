@php

	$seo = DB::table('seos')->first();
    $websitesetting = DB::table('websitesettings')->first();

@endphp

<!DOCTYPE html>
<html lang="en">
    <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="description" content="@yield('meta_description'),{{$seo->meta_description}}">
      <meta name="keyword" content="{{ isset($__env->getSections()['meta_keyword']) ? $__env->getSections()['meta_keyword'] : $seo->meta_keyword }}">
      <meta name="author" content="{{ $seo->meta_author }}">
      <meta name="google-verification" content="{{ $seo->google_verification }}">
      <meta name="google-adsense-account" content="ca-pub-2972675998911168">
      <title>{{ isset($__env->getSections()['meta_title']) ? $__env->getSections()['meta_title'] : $seo->meta_title }}</title>
      <!-- Open Graph / Facebook -->
      <meta property="og:title" content="Kotputli News - Latest Updates from Kotputli, Jaipur, Rajasthan, India">
      <meta property="og:description" content="Get the latest news from Kotputli, Jaipur, Rajasthan, and India. Stay updated with local news, breaking news, and headlines. Read news in Hindi.">
      <meta property="og:image" content="{{ asset('backend/assets/images/favicon.png') }}">
      <meta property="og:url" content="https://kotputlinews.in">
      <!-- Twitter -->
      <meta property="twitter:title" content="Kotputli News - Latest Updates from Kotputli, Jaipur, Rajasthan, India">
      <meta property="twitter:description" content="Get the latest news from Kotputli, Jaipur, Rajasthan, and India. Stay updated with local news, breaking news, and headlines. Read news in Hindi.">
      <meta property="twitter:image" content="{{ asset('backend/assets/images/favicon.png') }}">
      <meta property="twitter:card" content="kotputli_news_logo">
      <!-- Instagram -->
      <meta property="og:type" content="website">
      <meta property="og:site_name" content="Kotputli News">

      <!-- Google -->
      <meta itemprop="name" content="Kotputli News - Latest Updates from Kotputli, Jaipur, Rajasthan, India">
      <meta itemprop="description" content="Get the latest news from Kotputli, Jaipur, Rajasthan, and India. Stay updated with local news, breaking news, and headlines. Read news in Hindi.">
      <meta itemprop="image" content="{{ asset('backend/assets/images/favicon.png') }}">


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
