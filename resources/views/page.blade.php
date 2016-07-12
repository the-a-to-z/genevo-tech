@extends('layouts.master')

@section('content')

    @foreach($pageModules as $moduleName => $module)

       @include('modules.widgets.' . $module['widget'], ['data' => $module['data'], 'moduleName' => $moduleName])

    @endforeach

@endsection
