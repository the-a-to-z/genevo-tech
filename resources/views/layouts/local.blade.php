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
        <header id="header" class="header-full-width {{ $themeHeader }}">

            <div class="header-sticky light-header">

                <div class="container">
                    <div id="massive-menu" class="menuzord">

                        <!--logo start-->
                        <a href="{{ url('/') }}" class="logo-brand">
                            <!--<img src="img/logo-genovo-original.png" alt="">-->
                            <svg viewBox="0 0 159 80">
                                <path class="path1"
                                      d="M90.716 31.117v17.882h20.063v-4.943h-14.829v-11.921h14.829v-5.234h-14.829v-8.723h14.829v-4.943h-20.063v17.882z"></path>
                                <path class="path2"
                                      d="M13.374 13.962c-6.222 1.744-11.078 6.571-12.648 12.561-0.552 2.152-0.552 6.746 0 8.956 0.785 3.082 2.122 5.321 4.797 8.025 2.762 2.791 4.797 3.984 8.316 4.797 2.384 0.552 7.763 0.611 10.206 0.116 2.762-0.552 5.641-2.122 7.734-4.158 3.14-3.111 4.623-6.426 5.030-11.194l0.204-2.384h-14.625v4.914l8.752 0.174-0.901 1.774c-1.657 3.344-4.652 5.35-8.81 5.932-5.437 0.756-10.467-1.076-13.404-4.943-1.948-2.559-2.355-3.838-2.355-7.414 0-2.995 0.058-3.315 0.931-5.176 3.46-7.269 13.084-9.595 20.324-4.914 0.931 0.64 1.977 1.425 2.268 1.744 0.32 0.349 0.698 0.64 0.872 0.64 0.204 0 1.105-0.785 2.064-1.774l1.744-1.774-1.454-1.308c-1.977-1.774-4.827-3.402-7.269-4.158-2.704-0.872-9.363-1.105-11.776-0.436z"></path>
                                <path class="path4"
                                      d="M48.352 27.424c-2.937 1.047-4.943 2.878-6.426 5.873-0.698 1.425-0.785 1.919-0.785 4.652 0 2.704 0.087 3.256 0.785 4.71 1.018 2.209 3.111 4.39 5.146 5.379 1.483 0.756 1.919 0.814 4.972 0.814 3.14 0 3.46-0.058 5.292-0.931 1.774-0.843 4.303-2.937 4.303-3.576 0-0.145-0.727-0.814-1.599-1.483l-1.629-1.221-0.931 0.872c-2.704 2.559-6.222 2.937-9.334 0.96-0.901-0.582-1.541-1.308-2.064-2.297-1.279-2.53-1.861-2.355 8.025-2.355h8.781l-0.145-1.977c-0.291-3.809-2.53-7.153-5.961-8.839-1.599-0.785-2.297-0.931-4.42-1.018-1.89-0.087-2.878 0.029-4.012 0.436zM54.313 31.698c1.163 0.494 2.122 1.308 3.024 2.53l0.552 0.814h-11.979l0.523-0.901c1.425-2.442 5.117-3.576 7.879-2.442z"></path>
                                <path class="path5"
                                      d="M76.702 27.337c-0.814 0.262-1.977 1.018-2.966 1.919l-1.629 1.483v-3.256h-4.652v21.516h4.652v-6.484c0-6.164 0.029-6.513 0.698-7.909 1.803-3.896 6.193-4.71 7.967-1.483 0.407 0.756 0.494 2.006 0.582 8.374l0.087 7.502h4.623v-8.374c0-7.473-0.058-8.461-0.552-9.508-1.454-3.198-5.35-4.885-8.81-3.78z"></path>
                                <path class="path6"
                                      d="M113.774 27.249c0.552 1.483 10.526 21.749 10.671 21.749 0.204 0 10.758-21.516 10.758-21.894 0-0.116-1.134-0.174-2.5-0.145l-2.5 0.087-2.82 5.873-2.791 5.844-2.995-5.932-2.966-5.932h-2.5c-1.89 0-2.472 0.087-2.355 0.349z"></path>
                                <path class="path7"
                                      d="M144.769 27.279c-3.024 0.872-6.077 3.518-7.473 6.542-0.64 1.366-0.785 2.064-0.785 4.129 0 2.181 0.116 2.704 0.931 4.449 1.134 2.384 3.198 4.478 5.524 5.612 2.209 1.105 6.251 1.338 8.49 0.523 2.966-1.047 5.902-4.012 6.92-6.949 0.843-2.355 0.698-5.699-0.32-7.909-1.018-2.239-3.547-4.74-5.844-5.786-1.977-0.901-5.408-1.192-7.444-0.611zM149.77 31.902c1.512 0.436 3.402 2.122 4.071 3.547 2.326 5.117-3.344 10.7-8.607 8.49-2.384-1.018-4.187-3.518-4.216-5.873 0-1.541 1.221-3.984 2.5-4.943 1.89-1.454 4.071-1.89 6.251-1.221z"></path>
                                <path class="path8"
                                      d="M113.686 51.034v1.744h-113.687v2.908h113.687v2.908h45.359v-9.304h-45.359v1.744zM128.515 52.43c0 0.756 0.058 0.814 1.018 0.698 1.396-0.174 1.89 0.32 1.89 1.861 0 1.163-0.058 1.279-0.698 1.279-0.611 0-0.727-0.145-0.814-1.105-0.058-0.843-0.204-1.076-0.669-1.076s-0.611 0.232-0.669 1.076c-0.087 0.96-0.204 1.105-0.814 1.105-0.669 0-0.698-0.058-0.698-2.326 0-2.297 0-2.326 0.727-2.326 0.611 0 0.727 0.145 0.727 0.814zM143.344 53.941c0 2.297 0 2.326-0.727 2.326s-0.727-0.029-0.727-2.326c0-2.297 0-2.326 0.727-2.326s0.727 0.029 0.727 2.326zM118.92 52.342c0 0.262-0.262 0.436-0.727 0.436-0.698 0-0.727 0.087-0.727 1.744s-0.029 1.744-0.727 1.744c-0.698 0-0.727-0.087-0.727-1.744v-1.744h-0.872c-0.582 0-0.872-0.145-0.872-0.436 0-0.349 0.465-0.436 2.326-0.436s2.326 0.087 2.326 0.436zM122.351 53.418c0.204 0.204 0.349 0.64 0.349 1.018 0 0.582-0.145 0.669-1.221 0.727-1.25 0.029-1.25 0.029-0.174 0.145 0.582 0.058 1.134 0.32 1.221 0.552 0.116 0.32-0.174 0.407-1.425 0.407-1.338 0-1.657-0.116-2.035-0.698-0.494-0.756-0.232-2.006 0.494-2.297s2.442-0.204 2.791 0.145zM126.48 53.505c0 0.262-0.262 0.436-0.669 0.436-0.378 0-0.814 0.145-1.018 0.349-0.465 0.465 0.087 1.105 0.988 1.105 0.436 0 0.698 0.174 0.698 0.436 0 0.611-2.268 0.582-2.966-0.058-0.727-0.64-0.669-1.716 0.116-2.239 0.872-0.611 2.85-0.611 2.85-0.029zM136.017 53.418c0.204 0.204 0.349 0.901 0.349 1.599 0 1.134-0.058 1.25-0.698 1.25-0.611 0-0.727-0.145-0.814-1.105-0.058-0.843-0.204-1.076-0.669-1.076s-0.611 0.232-0.669 1.076c-0.087 0.96-0.204 1.105-0.814 1.105-0.669 0-0.698-0.087-0.698-1.599v-1.599h1.832c1.047 0 1.977 0.145 2.181 0.349zM140.756 53.36c0.378 0.204 0.552 0.611 0.552 1.308 0 1.163-0.582 1.599-2.181 1.599s-2.181-0.436-2.181-1.599c0-0.64 0.174-1.105 0.523-1.279 0.64-0.407 2.559-0.407 3.286-0.029zM148.025 53.36c0.378 0.204 0.552 0.611 0.552 1.308 0 1.163-0.582 1.599-2.181 1.599s-2.181-0.436-2.181-1.599c0-0.64 0.174-1.105 0.523-1.279 0.64-0.407 2.559-0.407 3.286-0.029zM153.52 54.726c0 2.209-0.465 2.704-2.53 2.704-1.163 0-1.541-0.116-1.541-0.436s0.349-0.436 1.25-0.494c1.163-0.029 1.163-0.029 0.204-0.145-1.366-0.174-1.744-0.552-1.744-1.716 0-1.221 0.552-1.541 2.704-1.57h1.657v1.657zM155.759 53.854l0.291 0.814 0.32-0.814c0.232-0.552 0.552-0.785 1.076-0.785 0.407 0 0.727 0.058 0.727 0.145 0 0.552-1.686 3.46-2.268 3.925-0.64 0.523-1.512 0.785-1.512 0.465 0-0.058-0.087-0.32-0.174-0.552-0.087-0.262 0.087-0.465 0.465-0.582 0.611-0.145 0.611-0.145-0.116-1.629-0.407-0.814-0.756-1.541-0.756-1.629s0.378-0.145 0.814-0.145c0.611 0 0.901 0.204 1.134 0.785z"></path>
                                <path class="path13"
                                      d="M-0.001 57.867c0 0.32 0.32 0.436 1.163 0.436h1.163v3.198c0 2.995 0.029 3.198 0.582 3.198s0.582-0.204 0.582-3.198v-3.198h1.163c0.843 0 1.163-0.116 1.163-0.436 0-0.349-0.523-0.436-2.908-0.436s-2.908 0.087-2.908 0.436z"></path>
                                <path class="path14"
                                      d="M15.264 57.721c-0.262 0.436 0.116 0.872 0.756 0.872 0.349 0 0.552-0.204 0.552-0.582 0-0.611-0.96-0.843-1.308-0.291z"></path>
                                <path class="path15"
                                      d="M24.277 57.721c-0.262 0.436 0.116 0.872 0.756 0.872 0.349 0 0.552-0.204 0.552-0.582 0-0.611-0.96-0.843-1.308-0.291z"></path>
                                <path class="path16"
                                      d="M42.159 61.065c0 3.431 0.029 3.634 0.582 3.634 0.523 0 0.582-0.204 0.582-1.599v-1.599h1.454c1.105 0 1.454-0.116 1.454-0.436s-0.349-0.436-1.454-0.436h-1.454v-2.326h1.599c1.221 0 1.599-0.087 1.599-0.436s-0.436-0.436-2.181-0.436h-2.181v3.634z"></path>
                                <path class="path17"
                                      d="M59.779 59.67c1.018 1.803 1.279 2.559 1.279 3.634 0 1.192 0.087 1.396 0.582 1.396s0.582-0.204 0.582-1.541c0-1.308 0.174-1.832 1.308-3.634 1.308-2.064 1.308-2.094 0.582-2.094-0.582 0-0.901 0.32-1.541 1.454-0.436 0.785-0.843 1.454-0.931 1.454s-0.494-0.669-0.931-1.454c-0.64-1.134-0.96-1.454-1.512-1.454-0.698 0-0.698 0.029 0.582 2.239z"></path>
                                <path class="path18"
                                      d="M83.447 61.065c0 3.431 0.029 3.634 0.582 3.634 0.523 0 0.582-0.204 0.582-1.599v-1.599h1.454c1.105 0 1.454-0.116 1.454-0.436s-0.349-0.436-1.454-0.436h-1.454v-2.326h1.599c1.221 0 1.599-0.087 1.599-0.436s-0.436-0.436-2.181-0.436h-2.181v3.634z"></path>
                                <path class="path19"
                                      d="M94.787 58.739c0 0.465-0.174 0.727-0.436 0.727-0.232 0-0.436 0.204-0.436 0.436s0.204 0.436 0.436 0.436c0.349 0 0.436 0.378 0.436 1.629 0 2.152 0.349 2.733 1.599 2.733 0.698 0 1.018-0.145 1.018-0.436 0-0.232-0.262-0.436-0.552-0.436-0.669 0-0.901-0.552-0.901-2.209 0-1.163 0.058-1.279 0.727-1.279 0.465 0 0.727-0.174 0.727-0.436s-0.262-0.436-0.727-0.436c-0.582 0-0.727-0.145-0.727-0.727 0-0.523-0.145-0.727-0.582-0.727s-0.582 0.204-0.582 0.727z"></path>
                                <path class="path20"
                                      d="M6.047 62.083c0.087 2.355 0.145 2.617 0.669 2.617 0.494 0 0.552-0.204 0.552-1.744 0-1.657 0.058-1.803 0.872-2.268 0.465-0.262 0.872-0.669 0.872-0.872 0-0.436-1.221-0.465-1.686 0-0.262 0.262-0.349 0.262-0.349 0 0-0.204-0.232-0.349-0.494-0.349-0.465 0-0.523 0.291-0.436 2.617z"></path>
                                <path class="path21"
                                      d="M10.088 59.67c-0.582 0.552-0.145 0.901 0.931 0.756 0.96-0.145 1.192-0.058 1.454 0.465 0.32 0.582 0.262 0.611-0.669 0.611-0.64 0-1.308 0.262-1.832 0.698-0.698 0.611-0.756 0.785-0.523 1.512 0.291 0.814 0.378 0.843 2.442 0.872l2.122 0.058-0.116-2.181c-0.087-1.744-0.204-2.268-0.669-2.588-0.552-0.407-2.791-0.552-3.14-0.204zM12.792 62.548c0 0.582-0.698 1.279-1.279 1.279-0.785 0-1.163-0.64-0.669-1.134 0.32-0.32 1.948-0.465 1.948-0.145z"></path>
                                <path class="path22"
                                      d="M15.409 62.083c0 2.413 0.029 2.617 0.582 2.617s0.582-0.204 0.582-2.617c0-2.413-0.029-2.617-0.582-2.617s-0.582 0.204-0.582 2.617z"></path>
                                <path class="path23"
                                      d="M17.968 62.083c0.087 2.355 0.145 2.617 0.669 2.617 0.494 0 0.552-0.204 0.552-1.89 0-1.744 0.058-1.919 0.727-2.239 1.163-0.523 1.599 0.087 1.599 2.268 0 1.657 0.058 1.861 0.582 1.861s0.582-0.204 0.582-2.122c0-1.716-0.116-2.239-0.523-2.617-0.64-0.582-2.413-0.64-2.908-0.145-0.262 0.262-0.349 0.262-0.349 0 0-0.204-0.232-0.349-0.494-0.349-0.465 0-0.523 0.291-0.436 2.617z"></path>
                                <path class="path24"
                                      d="M24.423 62.083c0 2.413 0.029 2.617 0.582 2.617s0.582-0.204 0.582-2.617c0-2.413-0.029-2.617-0.582-2.617s-0.582 0.204-0.582 2.617z"></path>
                                <path class="path25"
                                      d="M26.982 62.083c0.087 2.355 0.145 2.617 0.669 2.617 0.494 0 0.552-0.204 0.552-1.89 0-1.744 0.058-1.919 0.727-2.239 1.163-0.523 1.599 0.087 1.599 2.268 0 1.657 0.058 1.861 0.582 1.861s0.582-0.204 0.582-2.122c0-1.716-0.116-2.239-0.523-2.617-0.64-0.582-2.413-0.64-2.908-0.145-0.262 0.262-0.349 0.262-0.349 0 0-0.204-0.232-0.349-0.494-0.349-0.465 0-0.523 0.291-0.436 2.617z"></path>
                                <path class="path26"
                                      d="M33.989 59.757c-0.727 0.436-1.221 1.89-1.018 3.053 0.262 1.338 1.25 1.977 2.791 1.832 1.221-0.116 1.512 0.262 0.727 0.931-0.291 0.232-0.901 0.32-1.774 0.174-1.163-0.145-1.308-0.116-1.221 0.349 0.058 0.378 0.436 0.523 1.686 0.552 2.53 0.116 2.733-0.174 2.908-3.984 0.145-2.908 0.087-3.198-0.349-3.198-0.291 0-0.523 0.145-0.523 0.349 0 0.262-0.087 0.262-0.349 0-0.407-0.407-2.209-0.436-2.878-0.058zM36.577 60.687c0.204 0.204 0.349 0.814 0.349 1.396 0 1.192-0.407 1.744-1.338 1.744-0.814 0-1.366-0.698-1.366-1.744 0-0.465 0.145-1.047 0.378-1.279 0.436-0.552 1.483-0.611 1.977-0.116z"></path>
                                <path class="path27"
                                      d="M47.742 60.047c-1.163 1.105-1.192 2.937-0.058 4.071 0.407 0.407 0.988 0.582 1.89 0.582 1.803 0 2.762-0.931 2.762-2.617 0-1.657-0.988-2.617-2.704-2.617-0.872 0-1.454 0.174-1.89 0.582zM50.65 60.832c1.047 0.96 0.32 2.995-1.076 2.995-0.843 0-1.396-0.698-1.396-1.744 0-1.599 1.338-2.297 2.472-1.25z"></path>
                                <path class="path28"
                                      d="M53.441 62.083c0.087 2.355 0.145 2.617 0.669 2.617 0.494 0 0.552-0.204 0.552-1.744 0-1.657 0.058-1.803 0.872-2.268 0.465-0.262 0.872-0.669 0.872-0.872 0-0.436-1.221-0.465-1.686 0-0.262 0.262-0.349 0.262-0.349 0 0-0.204-0.232-0.349-0.494-0.349-0.465 0-0.523 0.291-0.436 2.617z"></path>
                                <path class="path29"
                                      d="M64.897 60.047c-1.163 1.105-1.192 2.937-0.058 4.071 0.407 0.407 0.988 0.582 1.89 0.582 1.803 0 2.762-0.931 2.762-2.617 0-1.657-0.988-2.617-2.704-2.617-0.872 0-1.454 0.174-1.89 0.582zM67.804 60.832c1.047 0.96 0.32 2.995-1.076 2.995-0.843 0-1.396-0.698-1.396-1.744 0-1.599 1.338-2.297 2.472-1.25z"></path>
                                <path class="path30"
                                      d="M70.654 61.443c0 2.472 0.465 3.256 1.919 3.256 0.582 0 1.279-0.145 1.599-0.291 0.378-0.204 0.552-0.204 0.552 0 0 0.145 0.232 0.291 0.523 0.291 0.436 0 0.494-0.291 0.407-2.617-0.087-2.355-0.145-2.617-0.669-2.617-0.494 0-0.552 0.204-0.552 1.89 0 1.57-0.087 1.919-0.582 2.181-1.366 0.727-2.035-0.145-2.035-2.704 0-1.163-0.087-1.366-0.582-1.366-0.523 0-0.582 0.204-0.582 1.977z"></path>
                                <path class="path31"
                                      d="M76.993 62.083c0.087 2.355 0.145 2.617 0.669 2.617 0.494 0 0.552-0.204 0.552-1.744 0-1.657 0.058-1.803 0.872-2.268 0.465-0.262 0.872-0.669 0.872-0.872 0-0.436-1.221-0.465-1.686 0-0.262 0.262-0.349 0.262-0.349 0 0-0.204-0.232-0.349-0.494-0.349-0.465 0-0.523 0.291-0.436 2.617z"></path>
                                <path class="path32"
                                      d="M88.1 61.443c0 2.472 0.465 3.256 1.919 3.256 0.582 0 1.279-0.145 1.599-0.291 0.378-0.204 0.552-0.204 0.552 0 0 0.145 0.232 0.291 0.523 0.291 0.436 0 0.494-0.291 0.407-2.617-0.087-2.355-0.145-2.617-0.669-2.617-0.494 0-0.552 0.204-0.552 1.89 0 1.57-0.087 1.919-0.582 2.181-1.366 0.727-2.035-0.145-2.035-2.704 0-1.163-0.087-1.366-0.582-1.366-0.523 0-0.582 0.204-0.582 1.977z"></path>
                                <path class="path33"
                                      d="M98.276 61.443c0 2.472 0.465 3.256 1.919 3.256 0.582 0 1.279-0.145 1.599-0.291 0.378-0.204 0.552-0.204 0.552 0 0 0.145 0.232 0.291 0.523 0.291 0.436 0 0.494-0.291 0.407-2.617-0.087-2.355-0.145-2.617-0.669-2.617-0.494 0-0.552 0.204-0.552 1.89 0 1.57-0.087 1.919-0.582 2.181-1.366 0.727-2.035-0.145-2.035-2.704 0-1.163-0.087-1.366-0.582-1.366-0.523 0-0.582 0.204-0.582 1.977z"></path>
                                <path class="path34"
                                      d="M104.905 62.083c0.087 2.355 0.145 2.617 0.669 2.617 0.494 0 0.552-0.204 0.552-1.744 0-1.657 0.058-1.803 0.872-2.268 0.465-0.262 0.872-0.669 0.872-0.872 0-0.436-1.221-0.465-1.686 0-0.262 0.262-0.349 0.262-0.349 0 0-0.204-0.232-0.349-0.494-0.349-0.465 0-0.523 0.291-0.436 2.617z"></path>
                                <path class="path35"
                                      d="M108.831 60.106c-0.32 0.378-0.669 1.018-0.785 1.425-0.204 0.988 0.32 2.5 0.988 2.878 0.64 0.349 3.402 0.378 3.605 0.058 0.291-0.465-0.291-0.785-1.541-0.785-0.988 0-1.366-0.145-1.686-0.669l-0.436-0.64h4.187l-0.204-0.96c-0.32-1.425-0.931-1.948-2.326-1.948-0.872 0-1.366 0.174-1.803 0.64zM111.593 60.978c0.087 0.436-0.116 0.523-1.076 0.523-1.25 0-1.454-0.204-0.843-0.814 0.523-0.523 1.803-0.32 1.919 0.291z"></path>
                            </svg>
                        </a>
                        <!--logo end-->

                        <!--mega menu start-->
                        <ul class="menuzord-menu pull-right op-nav">
                            @foreach($menus as $menu)


                                    @if($menu->url)
                                    <li>
                                        <a href="{{ $menu->url }}">{{ $menu->name }}</a>
                                    </li>
                                    @else
                                        <?php
                                            $request = ($menu->page_name ? $menu->page_name : '/');
                                            if($menu->module_id) {
                                                $request = $request . '#' . $menu->module_name;
                                            }
                                        ?>

                                        @if(Request::is($request))
                                            <li class="active">
                                                <a href="" onclick="return false">
                                                    {{ $menu->name }}
                                                </a>
                                            </li>
                                        @elseif(Request::segment(1) == $menu->page_name && Request::segment(1) != null)
                                            <li class="active">
                                                <a href="" onclick="return false">
                                                    {{ $menu->name }}
                                                </a>
                                            </li>
                                        @else
                                            <li>
                                                <a href="{{ url($request) }}">{{ $menu->name }}</a>
                                            </li>
                                        @endif
                                    @endif


                            @endforeach

                        </ul>
                        <!--mega menu end-->

                    </div>
                </div>
            </div>

        </header>
        <!--header end-->

    </div>
    <!--hero section-->

    <!--body content start-->
    <section class="body-content">

        @yield('content')

    </section>
    <!--body content end-->

    <!--footer 1 start -->
    <footer id="footer" class="orange text-center footer-1">
        <div class="container">
            <a href="index.html" class="footer-logo wow zoomIn">
                <svg viewBox="0 0 159 80">
                    <path class="path1"
                          d="M90.716 31.117v17.882h20.063v-4.943h-14.829v-11.921h14.829v-5.234h-14.829v-8.723h14.829v-4.943h-20.063v17.882z"></path>
                    <path class="path2"
                          d="M13.374 13.962c-6.222 1.744-11.078 6.571-12.648 12.561-0.552 2.152-0.552 6.746 0 8.956 0.785 3.082 2.122 5.321 4.797 8.025 2.762 2.791 4.797 3.984 8.316 4.797 2.384 0.552 7.763 0.611 10.206 0.116 2.762-0.552 5.641-2.122 7.734-4.158 3.14-3.111 4.623-6.426 5.030-11.194l0.204-2.384h-14.625v4.914l8.752 0.174-0.901 1.774c-1.657 3.344-4.652 5.35-8.81 5.932-5.437 0.756-10.467-1.076-13.404-4.943-1.948-2.559-2.355-3.838-2.355-7.414 0-2.995 0.058-3.315 0.931-5.176 3.46-7.269 13.084-9.595 20.324-4.914 0.931 0.64 1.977 1.425 2.268 1.744 0.32 0.349 0.698 0.64 0.872 0.64 0.204 0 1.105-0.785 2.064-1.774l1.744-1.774-1.454-1.308c-1.977-1.774-4.827-3.402-7.269-4.158-2.704-0.872-9.363-1.105-11.776-0.436z"></path>
                    <path class="path4"
                          d="M48.352 27.424c-2.937 1.047-4.943 2.878-6.426 5.873-0.698 1.425-0.785 1.919-0.785 4.652 0 2.704 0.087 3.256 0.785 4.71 1.018 2.209 3.111 4.39 5.146 5.379 1.483 0.756 1.919 0.814 4.972 0.814 3.14 0 3.46-0.058 5.292-0.931 1.774-0.843 4.303-2.937 4.303-3.576 0-0.145-0.727-0.814-1.599-1.483l-1.629-1.221-0.931 0.872c-2.704 2.559-6.222 2.937-9.334 0.96-0.901-0.582-1.541-1.308-2.064-2.297-1.279-2.53-1.861-2.355 8.025-2.355h8.781l-0.145-1.977c-0.291-3.809-2.53-7.153-5.961-8.839-1.599-0.785-2.297-0.931-4.42-1.018-1.89-0.087-2.878 0.029-4.012 0.436zM54.313 31.698c1.163 0.494 2.122 1.308 3.024 2.53l0.552 0.814h-11.979l0.523-0.901c1.425-2.442 5.117-3.576 7.879-2.442z"></path>
                    <path class="path5"
                          d="M76.702 27.337c-0.814 0.262-1.977 1.018-2.966 1.919l-1.629 1.483v-3.256h-4.652v21.516h4.652v-6.484c0-6.164 0.029-6.513 0.698-7.909 1.803-3.896 6.193-4.71 7.967-1.483 0.407 0.756 0.494 2.006 0.582 8.374l0.087 7.502h4.623v-8.374c0-7.473-0.058-8.461-0.552-9.508-1.454-3.198-5.35-4.885-8.81-3.78z"></path>
                    <path class="path6"
                          d="M113.774 27.249c0.552 1.483 10.526 21.749 10.671 21.749 0.204 0 10.758-21.516 10.758-21.894 0-0.116-1.134-0.174-2.5-0.145l-2.5 0.087-2.82 5.873-2.791 5.844-2.995-5.932-2.966-5.932h-2.5c-1.89 0-2.472 0.087-2.355 0.349z"></path>
                    <path class="path7"
                          d="M144.769 27.279c-3.024 0.872-6.077 3.518-7.473 6.542-0.64 1.366-0.785 2.064-0.785 4.129 0 2.181 0.116 2.704 0.931 4.449 1.134 2.384 3.198 4.478 5.524 5.612 2.209 1.105 6.251 1.338 8.49 0.523 2.966-1.047 5.902-4.012 6.92-6.949 0.843-2.355 0.698-5.699-0.32-7.909-1.018-2.239-3.547-4.74-5.844-5.786-1.977-0.901-5.408-1.192-7.444-0.611zM149.77 31.902c1.512 0.436 3.402 2.122 4.071 3.547 2.326 5.117-3.344 10.7-8.607 8.49-2.384-1.018-4.187-3.518-4.216-5.873 0-1.541 1.221-3.984 2.5-4.943 1.89-1.454 4.071-1.89 6.251-1.221z"></path>
                    <path class="path8"
                          d="M113.686 51.034v1.744h-113.687v2.908h113.687v2.908h45.359v-9.304h-45.359v1.744zM128.515 52.43c0 0.756 0.058 0.814 1.018 0.698 1.396-0.174 1.89 0.32 1.89 1.861 0 1.163-0.058 1.279-0.698 1.279-0.611 0-0.727-0.145-0.814-1.105-0.058-0.843-0.204-1.076-0.669-1.076s-0.611 0.232-0.669 1.076c-0.087 0.96-0.204 1.105-0.814 1.105-0.669 0-0.698-0.058-0.698-2.326 0-2.297 0-2.326 0.727-2.326 0.611 0 0.727 0.145 0.727 0.814zM143.344 53.941c0 2.297 0 2.326-0.727 2.326s-0.727-0.029-0.727-2.326c0-2.297 0-2.326 0.727-2.326s0.727 0.029 0.727 2.326zM118.92 52.342c0 0.262-0.262 0.436-0.727 0.436-0.698 0-0.727 0.087-0.727 1.744s-0.029 1.744-0.727 1.744c-0.698 0-0.727-0.087-0.727-1.744v-1.744h-0.872c-0.582 0-0.872-0.145-0.872-0.436 0-0.349 0.465-0.436 2.326-0.436s2.326 0.087 2.326 0.436zM122.351 53.418c0.204 0.204 0.349 0.64 0.349 1.018 0 0.582-0.145 0.669-1.221 0.727-1.25 0.029-1.25 0.029-0.174 0.145 0.582 0.058 1.134 0.32 1.221 0.552 0.116 0.32-0.174 0.407-1.425 0.407-1.338 0-1.657-0.116-2.035-0.698-0.494-0.756-0.232-2.006 0.494-2.297s2.442-0.204 2.791 0.145zM126.48 53.505c0 0.262-0.262 0.436-0.669 0.436-0.378 0-0.814 0.145-1.018 0.349-0.465 0.465 0.087 1.105 0.988 1.105 0.436 0 0.698 0.174 0.698 0.436 0 0.611-2.268 0.582-2.966-0.058-0.727-0.64-0.669-1.716 0.116-2.239 0.872-0.611 2.85-0.611 2.85-0.029zM136.017 53.418c0.204 0.204 0.349 0.901 0.349 1.599 0 1.134-0.058 1.25-0.698 1.25-0.611 0-0.727-0.145-0.814-1.105-0.058-0.843-0.204-1.076-0.669-1.076s-0.611 0.232-0.669 1.076c-0.087 0.96-0.204 1.105-0.814 1.105-0.669 0-0.698-0.087-0.698-1.599v-1.599h1.832c1.047 0 1.977 0.145 2.181 0.349zM140.756 53.36c0.378 0.204 0.552 0.611 0.552 1.308 0 1.163-0.582 1.599-2.181 1.599s-2.181-0.436-2.181-1.599c0-0.64 0.174-1.105 0.523-1.279 0.64-0.407 2.559-0.407 3.286-0.029zM148.025 53.36c0.378 0.204 0.552 0.611 0.552 1.308 0 1.163-0.582 1.599-2.181 1.599s-2.181-0.436-2.181-1.599c0-0.64 0.174-1.105 0.523-1.279 0.64-0.407 2.559-0.407 3.286-0.029zM153.52 54.726c0 2.209-0.465 2.704-2.53 2.704-1.163 0-1.541-0.116-1.541-0.436s0.349-0.436 1.25-0.494c1.163-0.029 1.163-0.029 0.204-0.145-1.366-0.174-1.744-0.552-1.744-1.716 0-1.221 0.552-1.541 2.704-1.57h1.657v1.657zM155.759 53.854l0.291 0.814 0.32-0.814c0.232-0.552 0.552-0.785 1.076-0.785 0.407 0 0.727 0.058 0.727 0.145 0 0.552-1.686 3.46-2.268 3.925-0.64 0.523-1.512 0.785-1.512 0.465 0-0.058-0.087-0.32-0.174-0.552-0.087-0.262 0.087-0.465 0.465-0.582 0.611-0.145 0.611-0.145-0.116-1.629-0.407-0.814-0.756-1.541-0.756-1.629s0.378-0.145 0.814-0.145c0.611 0 0.901 0.204 1.134 0.785z"></path>
                    <path class="path13"
                          d="M-0.001 57.867c0 0.32 0.32 0.436 1.163 0.436h1.163v3.198c0 2.995 0.029 3.198 0.582 3.198s0.582-0.204 0.582-3.198v-3.198h1.163c0.843 0 1.163-0.116 1.163-0.436 0-0.349-0.523-0.436-2.908-0.436s-2.908 0.087-2.908 0.436z"></path>
                    <path class="path14"
                          d="M15.264 57.721c-0.262 0.436 0.116 0.872 0.756 0.872 0.349 0 0.552-0.204 0.552-0.582 0-0.611-0.96-0.843-1.308-0.291z"></path>
                    <path class="path15"
                          d="M24.277 57.721c-0.262 0.436 0.116 0.872 0.756 0.872 0.349 0 0.552-0.204 0.552-0.582 0-0.611-0.96-0.843-1.308-0.291z"></path>
                    <path class="path16"
                          d="M42.159 61.065c0 3.431 0.029 3.634 0.582 3.634 0.523 0 0.582-0.204 0.582-1.599v-1.599h1.454c1.105 0 1.454-0.116 1.454-0.436s-0.349-0.436-1.454-0.436h-1.454v-2.326h1.599c1.221 0 1.599-0.087 1.599-0.436s-0.436-0.436-2.181-0.436h-2.181v3.634z"></path>
                    <path class="path17"
                          d="M59.779 59.67c1.018 1.803 1.279 2.559 1.279 3.634 0 1.192 0.087 1.396 0.582 1.396s0.582-0.204 0.582-1.541c0-1.308 0.174-1.832 1.308-3.634 1.308-2.064 1.308-2.094 0.582-2.094-0.582 0-0.901 0.32-1.541 1.454-0.436 0.785-0.843 1.454-0.931 1.454s-0.494-0.669-0.931-1.454c-0.64-1.134-0.96-1.454-1.512-1.454-0.698 0-0.698 0.029 0.582 2.239z"></path>
                    <path class="path18"
                          d="M83.447 61.065c0 3.431 0.029 3.634 0.582 3.634 0.523 0 0.582-0.204 0.582-1.599v-1.599h1.454c1.105 0 1.454-0.116 1.454-0.436s-0.349-0.436-1.454-0.436h-1.454v-2.326h1.599c1.221 0 1.599-0.087 1.599-0.436s-0.436-0.436-2.181-0.436h-2.181v3.634z"></path>
                    <path class="path19"
                          d="M94.787 58.739c0 0.465-0.174 0.727-0.436 0.727-0.232 0-0.436 0.204-0.436 0.436s0.204 0.436 0.436 0.436c0.349 0 0.436 0.378 0.436 1.629 0 2.152 0.349 2.733 1.599 2.733 0.698 0 1.018-0.145 1.018-0.436 0-0.232-0.262-0.436-0.552-0.436-0.669 0-0.901-0.552-0.901-2.209 0-1.163 0.058-1.279 0.727-1.279 0.465 0 0.727-0.174 0.727-0.436s-0.262-0.436-0.727-0.436c-0.582 0-0.727-0.145-0.727-0.727 0-0.523-0.145-0.727-0.582-0.727s-0.582 0.204-0.582 0.727z"></path>
                    <path class="path20"
                          d="M6.047 62.083c0.087 2.355 0.145 2.617 0.669 2.617 0.494 0 0.552-0.204 0.552-1.744 0-1.657 0.058-1.803 0.872-2.268 0.465-0.262 0.872-0.669 0.872-0.872 0-0.436-1.221-0.465-1.686 0-0.262 0.262-0.349 0.262-0.349 0 0-0.204-0.232-0.349-0.494-0.349-0.465 0-0.523 0.291-0.436 2.617z"></path>
                    <path class="path21"
                          d="M10.088 59.67c-0.582 0.552-0.145 0.901 0.931 0.756 0.96-0.145 1.192-0.058 1.454 0.465 0.32 0.582 0.262 0.611-0.669 0.611-0.64 0-1.308 0.262-1.832 0.698-0.698 0.611-0.756 0.785-0.523 1.512 0.291 0.814 0.378 0.843 2.442 0.872l2.122 0.058-0.116-2.181c-0.087-1.744-0.204-2.268-0.669-2.588-0.552-0.407-2.791-0.552-3.14-0.204zM12.792 62.548c0 0.582-0.698 1.279-1.279 1.279-0.785 0-1.163-0.64-0.669-1.134 0.32-0.32 1.948-0.465 1.948-0.145z"></path>
                    <path class="path22"
                          d="M15.409 62.083c0 2.413 0.029 2.617 0.582 2.617s0.582-0.204 0.582-2.617c0-2.413-0.029-2.617-0.582-2.617s-0.582 0.204-0.582 2.617z"></path>
                    <path class="path23"
                          d="M17.968 62.083c0.087 2.355 0.145 2.617 0.669 2.617 0.494 0 0.552-0.204 0.552-1.89 0-1.744 0.058-1.919 0.727-2.239 1.163-0.523 1.599 0.087 1.599 2.268 0 1.657 0.058 1.861 0.582 1.861s0.582-0.204 0.582-2.122c0-1.716-0.116-2.239-0.523-2.617-0.64-0.582-2.413-0.64-2.908-0.145-0.262 0.262-0.349 0.262-0.349 0 0-0.204-0.232-0.349-0.494-0.349-0.465 0-0.523 0.291-0.436 2.617z"></path>
                    <path class="path24"
                          d="M24.423 62.083c0 2.413 0.029 2.617 0.582 2.617s0.582-0.204 0.582-2.617c0-2.413-0.029-2.617-0.582-2.617s-0.582 0.204-0.582 2.617z"></path>
                    <path class="path25"
                          d="M26.982 62.083c0.087 2.355 0.145 2.617 0.669 2.617 0.494 0 0.552-0.204 0.552-1.89 0-1.744 0.058-1.919 0.727-2.239 1.163-0.523 1.599 0.087 1.599 2.268 0 1.657 0.058 1.861 0.582 1.861s0.582-0.204 0.582-2.122c0-1.716-0.116-2.239-0.523-2.617-0.64-0.582-2.413-0.64-2.908-0.145-0.262 0.262-0.349 0.262-0.349 0 0-0.204-0.232-0.349-0.494-0.349-0.465 0-0.523 0.291-0.436 2.617z"></path>
                    <path class="path26"
                          d="M33.989 59.757c-0.727 0.436-1.221 1.89-1.018 3.053 0.262 1.338 1.25 1.977 2.791 1.832 1.221-0.116 1.512 0.262 0.727 0.931-0.291 0.232-0.901 0.32-1.774 0.174-1.163-0.145-1.308-0.116-1.221 0.349 0.058 0.378 0.436 0.523 1.686 0.552 2.53 0.116 2.733-0.174 2.908-3.984 0.145-2.908 0.087-3.198-0.349-3.198-0.291 0-0.523 0.145-0.523 0.349 0 0.262-0.087 0.262-0.349 0-0.407-0.407-2.209-0.436-2.878-0.058zM36.577 60.687c0.204 0.204 0.349 0.814 0.349 1.396 0 1.192-0.407 1.744-1.338 1.744-0.814 0-1.366-0.698-1.366-1.744 0-0.465 0.145-1.047 0.378-1.279 0.436-0.552 1.483-0.611 1.977-0.116z"></path>
                    <path class="path27"
                          d="M47.742 60.047c-1.163 1.105-1.192 2.937-0.058 4.071 0.407 0.407 0.988 0.582 1.89 0.582 1.803 0 2.762-0.931 2.762-2.617 0-1.657-0.988-2.617-2.704-2.617-0.872 0-1.454 0.174-1.89 0.582zM50.65 60.832c1.047 0.96 0.32 2.995-1.076 2.995-0.843 0-1.396-0.698-1.396-1.744 0-1.599 1.338-2.297 2.472-1.25z"></path>
                    <path class="path28"
                          d="M53.441 62.083c0.087 2.355 0.145 2.617 0.669 2.617 0.494 0 0.552-0.204 0.552-1.744 0-1.657 0.058-1.803 0.872-2.268 0.465-0.262 0.872-0.669 0.872-0.872 0-0.436-1.221-0.465-1.686 0-0.262 0.262-0.349 0.262-0.349 0 0-0.204-0.232-0.349-0.494-0.349-0.465 0-0.523 0.291-0.436 2.617z"></path>
                    <path class="path29"
                          d="M64.897 60.047c-1.163 1.105-1.192 2.937-0.058 4.071 0.407 0.407 0.988 0.582 1.89 0.582 1.803 0 2.762-0.931 2.762-2.617 0-1.657-0.988-2.617-2.704-2.617-0.872 0-1.454 0.174-1.89 0.582zM67.804 60.832c1.047 0.96 0.32 2.995-1.076 2.995-0.843 0-1.396-0.698-1.396-1.744 0-1.599 1.338-2.297 2.472-1.25z"></path>
                    <path class="path30"
                          d="M70.654 61.443c0 2.472 0.465 3.256 1.919 3.256 0.582 0 1.279-0.145 1.599-0.291 0.378-0.204 0.552-0.204 0.552 0 0 0.145 0.232 0.291 0.523 0.291 0.436 0 0.494-0.291 0.407-2.617-0.087-2.355-0.145-2.617-0.669-2.617-0.494 0-0.552 0.204-0.552 1.89 0 1.57-0.087 1.919-0.582 2.181-1.366 0.727-2.035-0.145-2.035-2.704 0-1.163-0.087-1.366-0.582-1.366-0.523 0-0.582 0.204-0.582 1.977z"></path>
                    <path class="path31"
                          d="M76.993 62.083c0.087 2.355 0.145 2.617 0.669 2.617 0.494 0 0.552-0.204 0.552-1.744 0-1.657 0.058-1.803 0.872-2.268 0.465-0.262 0.872-0.669 0.872-0.872 0-0.436-1.221-0.465-1.686 0-0.262 0.262-0.349 0.262-0.349 0 0-0.204-0.232-0.349-0.494-0.349-0.465 0-0.523 0.291-0.436 2.617z"></path>
                    <path class="path32"
                          d="M88.1 61.443c0 2.472 0.465 3.256 1.919 3.256 0.582 0 1.279-0.145 1.599-0.291 0.378-0.204 0.552-0.204 0.552 0 0 0.145 0.232 0.291 0.523 0.291 0.436 0 0.494-0.291 0.407-2.617-0.087-2.355-0.145-2.617-0.669-2.617-0.494 0-0.552 0.204-0.552 1.89 0 1.57-0.087 1.919-0.582 2.181-1.366 0.727-2.035-0.145-2.035-2.704 0-1.163-0.087-1.366-0.582-1.366-0.523 0-0.582 0.204-0.582 1.977z"></path>
                    <path class="path33"
                          d="M98.276 61.443c0 2.472 0.465 3.256 1.919 3.256 0.582 0 1.279-0.145 1.599-0.291 0.378-0.204 0.552-0.204 0.552 0 0 0.145 0.232 0.291 0.523 0.291 0.436 0 0.494-0.291 0.407-2.617-0.087-2.355-0.145-2.617-0.669-2.617-0.494 0-0.552 0.204-0.552 1.89 0 1.57-0.087 1.919-0.582 2.181-1.366 0.727-2.035-0.145-2.035-2.704 0-1.163-0.087-1.366-0.582-1.366-0.523 0-0.582 0.204-0.582 1.977z"></path>
                    <path class="path34"
                          d="M104.905 62.083c0.087 2.355 0.145 2.617 0.669 2.617 0.494 0 0.552-0.204 0.552-1.744 0-1.657 0.058-1.803 0.872-2.268 0.465-0.262 0.872-0.669 0.872-0.872 0-0.436-1.221-0.465-1.686 0-0.262 0.262-0.349 0.262-0.349 0 0-0.204-0.232-0.349-0.494-0.349-0.465 0-0.523 0.291-0.436 2.617z"></path>
                    <path class="path35"
                          d="M108.831 60.106c-0.32 0.378-0.669 1.018-0.785 1.425-0.204 0.988 0.32 2.5 0.988 2.878 0.64 0.349 3.402 0.378 3.605 0.058 0.291-0.465-0.291-0.785-1.541-0.785-0.988 0-1.366-0.145-1.686-0.669l-0.436-0.64h4.187l-0.204-0.96c-0.32-1.425-0.931-1.948-2.326-1.948-0.872 0-1.366 0.174-1.803 0.64zM111.593 60.978c0.087 0.436-0.116 0.523-1.076 0.523-1.25 0-1.454-0.204-0.843-0.814 0.523-0.523 1.803-0.32 1.919 0.291z"></path>
                </svg>
            </a>
            <div class="copyright-container">
                <div class="copyright">
                    &copy; {{ $companyName }} 2016.
                </div>
                <div class="copyright-sub-title">
                    {{ $companyAddress }} <br>
                    {!! $companyContactNumber !!} <br>
                    {!! $companyContactEmail !!}
                </div>
            </div>

            <div class="social-link widget-social-link circle social-large">
                <a href="#" class="facebook">
                    <i class="fa fa-facebook"></i>
                </a>
                <a href="#" class="linkedin">
                    <i class="fa fa-linkedin"></i>
                </a>
                <a href="#" class="google-plus">
                    <i class="fa fa-google-plus"></i>
                </a>
            </div>
        </div>
    </footer>
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