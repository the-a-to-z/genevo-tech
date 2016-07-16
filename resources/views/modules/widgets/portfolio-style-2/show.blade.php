@extends('layouts.master')

@section('content')

    <section class="page-title">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="text-uppercase">
                        @if(isset($currentMenu))
                            <a href="{{ url('/' . $currentMenu->slug) }}" class="inactive-link">
                                {{ $module['data']->display_name }}
                            </a>
                        @else
                            <a href="#" class="inactive-link">
                                {{ $module['data']->display_name }}
                            </a>
                        @endif
                        <i class="fa fa-angle-right"></i>
                        <a href="#">{{ $module['item']->title }}</a>
                    </h4>
                </div>
            </div>
        </div>
    </section>

    <section class="body-content">
        <div class="page-content">
            <div class="container">

                <div class="row">

                    <div class="col-md-12">
                        <!--classic image post-->
                        <div class="blog-classic">
                            <div class="blog-post">
                                {{--<div class="full-width">--}}
                                    {{--<img src="{{ url(uploadPath($module['data']->widget_name . '/' . $module['item']->image)) }}"--}}
                                         {{--alt="{{ $module['item']->title }}"--}}
                                         {{--class="img-responsive"--}}
                                    {{-->--}}
                                {{--</div>--}}

                                {!! $module['item']->description !!}
                            </div>

                        </div>
                    </div>
                </div>

                <div class="clearfix inline-block m-bot-50">
                    <h5 class="text-uppercase">Share Post </h5>
                    <div class="widget-social-link circle social-large">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-google-plus"></i></a>
                        <a href="#"><i class="fa fa-linkedin"></i></a>
                    </div>
                </div>

            </div>
        </div>

    </section>

@endsection
