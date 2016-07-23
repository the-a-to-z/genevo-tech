@extends('layouts.master')

@section('content')

    @if(isset($module))

        @include('modules.widgets.' . $module['data']->widget_name . '.show', $module)

    @else

        @foreach($data['pageModules'] as $pageData)

            @include('modules.widgets.' . $pageData['module']->widget_name . '.index', ['data' => $pageData, 'currentMenu' => $data['currentMenu']])

        @endforeach

    @endif

@endsection
