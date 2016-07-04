@extends('layouts.app')

@section('content')
    <div id="about" class="page-content gray-bg">
        <div class="container">
            <div class="row">
                <div class="heading-title">
                    <h3 class="text-uppercase text-center">{{ $modules['about-description']->title }}</h3>

                    <p class="center">
                        {!! $modules['about-description']->description !!}
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
