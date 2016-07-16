@extends('layouts.master')

@section('content')

    @if(isset($module))

        @include('modules.widgets.' . $module['data']->widget_name . '.show', $module)

    @else

        @foreach($pageModules as $moduleName => $module)

            @include('modules.widgets.' . $module['widget'] . '.index', ['data' => $module['data'], 'moduleName' => $moduleName])

        @endforeach

    @endif

@endsection
