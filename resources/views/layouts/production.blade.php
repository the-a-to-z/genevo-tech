<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!--favicon icon-->
    <link rel="icon" type="image/png" href="{{ url('img/favicon.png') }}">

    <title>{{ $companyName }}</title>

    <!--common style-->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,800italic,800,700italic,700'
          rel='stylesheet' type='text/css'>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flexslider/2.6.1/flexslider.min.css">

    <link href="{{ url('css/shortcodes/all.css') }}" rel="stylesheet">
    <link href="{{ url('css/app.css') }}" rel="stylesheet">

    <!-- Animation library -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css" rel="stylesheet"/>

    <!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
    <link rel="stylesheet" type="text/css" href="{{ url('vendors/slider-revolution/css/settings.min.css') }}" media="screen">

    @yield('style')

</head>

<body>

<!--  preloader start -->
<div id="tb-preloader">
    <div class="tb-preloader-wave"></div>
</div>
<!-- preloader end -->

<div id="main-wrapper">

    <div class="wrapper" id="home">

        <!--header start-->
        @include('partials.header')
        <!--header end-->

    </div>
    <!--hero section-->

    <!--body content start-->
    <section class="body-content">

        @yield('content')

    </section>
    <!--body content end-->

    <!--footer 1 start -->
    @include('partials.footer')
    <!--footer 1 end-->

</div>
{{--#main-wrapper--}}

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/flexslider/2.6.1/jquery.flexslider.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.1/isotope.pkgd.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.imagesloaded/4.1.0/imagesloaded.pkgd.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/smooth-scroll/10.0.0/js/smooth-scroll.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>

<script async src="{{ url('js/app.js') }}"></script>

@yield("script")

</body>
</html>