@extends('layouts.master')

@section('content')

    @if(isset($data['pageDetail']))

        @include('modules.widgets.' . $data['module']->widget_name . '.show', ['data' => $data])

    @else

        @foreach($data['pageModules'] as $pageData)

            @include('modules.widgets.' . $pageData['module']->widget_name . '.index', ['data' => $pageData, 'currentMenu' => $data['currentMenu']])

        @endforeach

    @endif

@endsection
