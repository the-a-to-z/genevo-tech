<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">

    <!--favicon icon-->
    <link rel="icon" type="image/png" href="{{ url('img/favicon.png') }}">

    <title>{{ $companyName }}</title>

    <!--common style-->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,800italic,800,700italic,700'
          rel='stylesheet' type='text/css'>
    <link href="{{ url("css/bootstrap.min.css") }}" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{ url("css/magnific-popup.css") }}" rel="stylesheet">
    <link href="{{ url('css/shortcodes/shortcodes.css') }}" rel="stylesheet">
    <link href="{{ url("css/owl.carousel.css") }}" rel="stylesheet">
    <link href="{{ url('css/owl.theme.css') }}" rel="stylesheet">
    <link href="{{ url('css/style.css?4') }}" rel="stylesheet">
    <link href="{{ url('css/blog.css') }}" rel="stylesheet">
    <link href="{{ url('css/style-responsive.css?1') }}" rel="stylesheet">
    <link href="{{ url('css/default-theme.css?v=1') }}" rel="stylesheet">

    <!-- Animation library -->
    <link href="{{ url('css/animate.min.css') }}" rel="stylesheet"/>

    <!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
    <link rel="stylesheet" type="text/css" href="{{ url('vendors/slider-revolution/css/settings.css') }}" media="screen">

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

<!-- Placed js at the end of the document so the pages load faster -->
<script src="{{ url('js/jquery-1.10.2.min.js') }}"></script>
<script src="{{ url('js/bootstrap.min.js') }}"></script>
<script src="{{ url('js/menuzord.js') }}"></script>
<script src="{{ url('js/jquery.flexslider-min.js') }}"></script>
<script src="{{ url('js/owl.carousel.min.js') }}"></script>
<script src="{{ url('js/jquery.isotope.js') }}"></script>
<script src="{{ url('js/imagesloaded.js') }}?2"></script>
<script src="{{ url('js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ url('js/jquery.countTo.js') }}"></script>
<script src="{{ url('js/visible.js') }}"></script>
<script src="{{ url('js/smooth.js') }}"></script>
<script src="{{ url('js/wow.min.js') }}"></script>

<!-- SLIDER REVOLUTION 4.x SCRIPTS  -->
<script src="{{ url('vendors/slider-revolution/js/jquery.themepunch.tools.min.js') }}"></script>
<script src="{{ url('vendors/slider-revolution/js/jquery.themepunch.revolution.min.js') }}"></script>

<!-- only for single page nav -->
<script src="{{ url('js/jquery.nav.js') }}"></script>

<!--common scripts-->
<script src="{{ url('js/scripts.js?8') }}"></script>

<!-- SLIDER REVOLUTION INIT  -->
<script type="text/javascript">

    jQuery(document).ready(function () {

        if(jQuery('.tp-banner').length > 0) {
            jQuery('.tp-banner').show().revolution({
                dottedOverlay: "none",
                delay: 8000,

                startheight: 450,
                hideThumbs: 200,

                thumbWidth: 100,
                thumbHeight: 50,
                thumbAmount: 5,

                navigationType: "arrow",
                navigationArrows: "solo",
                navigationStyle: "preview1",

                touchenabled: "on",
                onHoverStop: "on",

                swipe_velocity: 0.7,
                swipe_min_touches: 1,
                swipe_max_touches: 1,
                drag_block_vertical: false,

                parallax: "mouse",
                parallaxBgFreeze: "on",
                parallaxLevels: [
                    7,
                    4,
                    3,
                    2,
                    5,
                    4,
                    3,
                    2,
                    1,
                    0
                ],

                keyboardNavigation: "off",

                navigationHAlign: "center",
                navigationVAlign: "bottom",
                navigationHOffset: 0,
                navigationVOffset: 20,

                soloArrowLeftHalign: "left",
                soloArrowLeftValign: "center",
                soloArrowLeftHOffset: 20,
                soloArrowLeftVOffset: 0,

                soloArrowRightHalign: "right",
                soloArrowRightValign: "center",
                soloArrowRightHOffset: 20,
                soloArrowRightVOffset: 0,

                shadow: 0,
                fullWidth: "on",
                // autoHeight:"on",
                fullScreen: "off",

                spinner: "spinner4",

                stopLoop: "off",
                stopAfterLoops: -1,
                stopAtSlide: -1,

                shuffle: "off",

                autoHeight: "off",
                forceFullWidth: "off",

                hideThumbsOnMobile: "off",
                hideNavDelayOnMobile: 1500,
                hideBulletsOnMobile: "off",
                hideArrowsOnMobile: "off",
                hideThumbsUnderResolution: 0,

                hideSliderAtLimit: 0,
                hideCaptionAtLimit: 0,
                hideAllCaptionAtLilmit: 0,
                startWithSlide: 0,
                videoJsPath: "vendors/slider-revolution/videojs/",
                fullScreenOffsetContainer: ""
            });
        }

    }); //ready

</script>

@yield("script")

</body>
</html>