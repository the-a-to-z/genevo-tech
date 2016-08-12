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
                                @if(hasPermission('edit-setting', $permissions))
                                    <div class="col-md-12">
                                        {!! btnSubmitEdit('Save Settings') !!}
                                    </div>
                                @endif

                            </div>
                        </div>

                        <div class="content">

                            <div class="row">
                                <div class="col-md-12">
                                    <h4>General Setting</h4>
                                </div>
                            </div>

                            <div class="table-responsive table-full-width">
                                <table class="table no-bordered">
                                    <tbody>

                                    <tr>
                                        <td style="width: 10px">
                                            <i class="pe-7s-help1" data-tipso=""></i>
                                        </td>
                                        <th style="width: 140px;">
                                            {{ getSetting('company-name', 'display_name', $allSettings)}}
                                        </th>

                                        <td class="text-primary td-input">
                                            <input type="text"
                                                   name="company-name"
                                                   value="{{ getSetting('company-name', 'value', $allSettings)}}">
                                        </td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <h4>Theme Setting</h4>
                                </div>
                            </div>

                            <div class="table-responsive table-full-width">
                                <table class="table no-bordered">
                                    <tbody>

                                    <tr>
                                        <td style="width: 10px">
                                            <i class="pe-7s-help1" data-tipso=""></i>
                                        </td>
                                        <th style="width: 140px;">
                                            Header style
                                        </th>

                                        <td class="text-primary td-input">
                                            <select name="theme-header">
                                                <option value="0" {{ getSetting('theme-header', 'value', $allSettings) == false ? 'selected' : '' }}>
                                                    Default
                                                </option>
                                                <option value="orange" {{ getSetting('theme-header', 'value', $allSettings) == 'orange' ? 'selected' : '' }}>
                                                    Orange
                                                </option>
                                            </select>

                                        </td>
                                    </tr>

                                    <tr>
                                        <td style="width: 10px">
                                            <i class="pe-7s-help1" data-tipso=""></i>
                                        </td>
                                        <th style="width: 140px;">
                                            Image Logo
                                        </th>

                                        <td class="text-primary td-input">
                                            <textarea name="company-logo" class="form-control resize-verticle" cols="30" rows="3">{{ getSetting('company-logo', 'value', $allSettings)}}</textarea>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td style="width: 10px">
                                            <i class="pe-7s-help1" data-tipso=""></i>
                                        </td>
                                        <th style="width: 140px;">
                                            Image type
                                        </th>

                                        <td class="text-primary td-input">
                                            <select name="company-logo-image-type">
                                                <option value="svg-code" {{ getSetting('company-logo-image-type', 'value', $allSettings) == 'svg-code' ? 'selected' : '' }}>
                                                    SVG Code
                                                </option>
                                                <option value="orange" {{ getSetting('company-logo-image-type', 'value', $allSettings) == 'file' ? 'selected' : '' }}>
                                                    File
                                                </option>
                                            </select>
                                        </td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <h4>Contact Setting</h4>
                                </div>
                            </div>

                            <div class="table-responsive table-full-width">
                                <table class="table no-bordered">
                                    <tbody>

                                    <tr>
                                        <td style="width: 10px">
                                            <i class="pe-7s-help1" data-tipso=""></i>
                                        </td>
                                        <th style="width: 140px;">
                                            Address
                                        </th>

                                        <td class="text-primary td-input ">
                                            <input type="text"
                                                   name="company-address"
                                                   value="{{ getSetting('company-address', 'value', $allSettings)}}">
                                        </td>
                                    </tr>

                                    <tr>
                                        <td style="width: 10px">
                                            <i class="pe-7s-help1" data-tipso=""></i>
                                        </td>
                                        <th>
                                            Phone Number
                                        </th>

                                        <td class="text-primary td-input ">
                                            <input type="text"
                                                   name="company-contact-number"
                                                   value="{{ getSetting('company-contact-number', 'value', $allSettings)}}">
                                        </td>
                                    </tr>

                                    <tr>
                                        <td style="width: 10px">
                                            <i class="pe-7s-help1" data-tipso=""></i>
                                        </td>
                                        <th>
                                            Email
                                        </th>

                                        <td class="text-primary td-input ">
                                            <input type="text"
                                                   name="company-contact-email"
                                                   value="{{ getSetting('company-contact-email', 'value', $allSettings)}}">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 10px">
                                            <i class="pe-7s-help1" data-tipso=""></i>
                                        </td>
                                        <th>
                                            Google Map
                                        </th>

                                        <td class="text-primary td-input ">
                                            <input type="text"
                                                   name="company-map-coordination"
                                                   value="{{ getSetting('company-map-coordination', 'value', $allSettings)}}">
                                        </td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>

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