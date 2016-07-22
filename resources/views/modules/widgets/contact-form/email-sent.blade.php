@extends('layouts.master')

@section('content')


    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="heading-title">
                    <h4 class="text-uppercase text-center">Your message has been sent.</h4>

                    <div class="text-center p-top-30">
                        {!! $response_message !!}
                    </div>

                    <div class="text-center p-top-30">
                        <a href="{{ url('/') }}" class="btn btn-large btn-fill btn-success">
                            Continue visit our site <i class="fa fa-forward"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
