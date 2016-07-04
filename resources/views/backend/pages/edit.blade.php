@extends('backend.layouts.master')

@section('content')

    <div class="content">
        <div class="container-fluid">

            {!! openFormEdit('pages', $page->id) !!}

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Edit page {{ $page->name }}</h4>
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
                                               readonly
                                               value="{{ ($errors->has('name') ? old('name') : $page->name) }}"
                                        >

                                        <div class="input-error-message">{{ $errors->first('name') }}&nbsp;</div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Display Name</label>
                                        <input type="text"
                                               name="display_name"
                                               class="form-control"
                                               autofocus
                                               value="{{ ($errors->has('display_name') ? old('display_name') : $page->display_name) }}"
                                        >

                                        <div class="input-error-message">{{ $errors->first('display_name') }}&nbsp;</div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Description</label>

                                        <textarea rows="5" class="form-control" name="description">{{ ($errors->has('description') ? old('description') : $page->description) }}</textarea>

                                        <div class="input-error-message">{{ $errors->first('description') }}
                                            &nbsp;
                                        </div>
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
                                            @foreach($notPageModules as $module)
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
                                            @foreach($pageModules as $module)
                                                <div>
                                                    <input type="hidden" disabled name="module_id[]" value="{{ $module->id }}">
                                                    {{ $module->display_name }}
                                                </div>
                                            @endforeach
                                        </div>

                                    </div>
                                </div>

                            </div>

                            <div class="clearfix">&nbsp;</div>
                        </div>
                    </div>
                </div>
            </div>


            <footer class="form-fixed-footer">
                <div class="container-fluid">
                    <button type="submit"
                            class="btn btn-info btn-fill pull-right m-left-5"
                            id="btnSubmit">Update
                    </button>

                    <a href="{{ url(config('constants.backend-url') . 'roles') }}"
                       class="btn btn-danger btn-fill pull-right">Cancel</a>
                </div>
            </footer>

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
            })
        });
    </script>

@endsection