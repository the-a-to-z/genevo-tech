@extends('backend.layouts.master')

@section('content')

    <div class="content">
        <div class="container-fluid">

            {!! openFormEdit('settings/update', null, false) !!}

            <div class="alert alert-danger">
                <span><b> Warning - </b> Please be sure that everything are correct before saving the settings.</span>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4 class="title">All Settings</h4>
                                </div>

                                @if(hasPermission('edit-setting', $permissions))
                                    <div class="col-md-6">
                                        {!! btnSubmitEdit('Save Settings') !!}
                                    </div>
                                @endif

                            </div>
                        </div>

                        <div class="content table-responsive table-full-width">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th>Setting Name</th>
                                    <th>Value</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($allSettings as $key => $setting)

                                    <tr>
                                        <td style="width: 10px"><i class="pe-7s-help1" data-tipso="{{ $setting->description }}"></i></td>
                                        <th class="col-md-4">
                                            {{ $setting->display_name }}
                                        </th>

                                        <td class="text-primary td-input " data-tipso="test">
                                        @if($errors->has($setting->name))
                                            <input type="text"
                                                   class="hasError"
                                                   name="{{ $setting->name }}"
                                                   value="{{ old($setting->name) }}"
                                                   data-tipso="{{ $errors->first($setting->name) }}">
                                        @else
                                                <input type="text"
                                                       name="{{ $setting->name }}"
                                                       value="{{ $setting->value }}">
                                        @endif

                                        </td>

                                        {{--<td class="text-right">--}}
                                            {{--@if( hasPermission('delete-setting', $permissions) )--}}
                                                {{--{!! btnDelete('settings', $setting->id) !!}--}}
                                            {{--@endif--}}
                                        {{--</td>--}}
                                    </tr>

                                @endforeach

                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>

            {!! closeForm() !!}

        </div>
    </div>

@endsection

@section('style')
    <link rel="stylesheet" href="{{ url('vendors/tipso/tipso.css') }}">
    <link rel="stylesheet" href="{{ url('css/animate.css') }}">
@endsection

@section('script')

    <script src="{{ url('vendors/tipso/tipso.js') }}"></script>
    <script>
        $('.pe-7s-help1').tipso({
            background: 'rgba(0,0,0,.6)',
            color: '#fff',
            position: 'top-left'
        });

        $('.hasError').tipso({
            background: '#fc727a',
            position: 'right',
            onHide: function(elm){
                elm.removeClass('hasError');
                elm.removeClass('tipso_style');
                elm.removeAttr('data-tipso');
            }
        });

        $('.hasError').tipso('show');
    </script>

@endsection