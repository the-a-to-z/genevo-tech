@extends('backend.layouts.master')

@section('content')

    <div class="content">
        <div class="container-fluid">

            {!! openFormCreate('pages') !!}

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">New page</h4>
                        </div>
                        <div class="content">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text"
                                               name="name"
                                               class="form-control"
                                               autofocus
                                               value="{{ ($errors->has('name') ? old('name') : '') }}"
                                        >

                                        {!! formError($errors->first('name')) !!}
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Display Name</label>
                                        <input type="text"
                                               name="display_name"
                                               class="form-control"
                                               autofocus
                                               value="{{ ($errors->has('display_name') ? old('display_name') : '') }}"
                                        >

                                        {!! formError($errors->first('display_name')) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Description {!! formErrorInline($errors->first('description')) !!}</label>

                                        <textarea rows="5" class="form-control" name="description">{{ ($errors->has('description') ? old('description') : '') }}</textarea>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="content">

                            <div id="fieldChooser" tabIndex="1" class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>All Modules</label>

                                        <div id="sourceFields" class="field-chooser-source">
                                            @foreach($modules as $module)
                                                <div>
                                                    <input type="hidden" disabled name="module_id[]" value="{{ $module->id }}">
                                                    {{ $module->display_name }}
                                                </div>
                                            @endforeach
                                        </div>

                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Modules Selected</label>

                                        <div id="destinationFields" class="field-chooser-target">
                                        </div>

                                    </div>
                                </div>

                            </div>

                            <div class="clearfix">&nbsp;</div>
                        </div>
                    </div>
                </div>
            </div>

            {!! formCreateFooter('pages') !!}

            {!! closeForm() !!}

        </div>
    </div>

@endsection

@section('style')
    <link href="{{ url('css/jquery-ui.css') }}" rel="stylesheet"/>
    <link href="{{ url('vendors/fieldChooser-master/style.css') }}" rel="stylesheet"/>
@endsection

@section('script')

    <script src="{{ url('js/jquery-ui.js') }}"></script>
    <script src="{{ url('vendors/fieldChooser-master/fieldChooser.js') }}"></script>

    <script>
        $(document).ready(function () {
            var $sourceFields = $("#sourceFields");
            var $destinationFields = $("#destinationFields");
            var $chooser = $("#fieldChooser").fieldChooser(sourceFields, destinationFields);

            $chooser.on('listChanged', function () {
                $('.field-chooser-source input[type="hidden"]').attr('disabled', true);
                $('.field-chooser-target input[type="hidden"]').attr('disabled', false);
            });

            $('#formCreate').submit(function () {
                $('.field-chooser-source').find('input[type="hidden"]').attr('disabled', true);
                $('.field-chooser-target').find('input[type="hidden"]').attr('disabled', false);
            });
        });
    </script>

@endsection