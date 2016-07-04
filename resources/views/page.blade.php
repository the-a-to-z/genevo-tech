@extends('layouts.app')

@section('content')

    @foreach($modules as $name => $module)

        @include('modules.' . $name)

    @endforeach

@endsection
