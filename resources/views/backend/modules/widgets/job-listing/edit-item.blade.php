@extends('backend.layouts.master')

@section('content')

    <div class="content">
        <div class="container-fluid">

            {!! openFormUploadEdit('module/'. $module->id . '/job-listing/item', $item->id) !!}

            <input type="hidden" name="module_id" value="{{ $module->id }}">
            <input type="hidden" name="widget_id" value="{{ $widget->id }}">
            {!! method_field('patch') !!}

            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">
                                <input type="text"
                                       name="job_title"
                                       class="form-control"
                                       placeholder="Title..."
                                       autofocus
                                       value="{{ (old('job_title') ? old('job_title') : $item->job_title) }}">

                                @if($errors->has('description'))
                                    {!! formError($errors->first('job_title')) !!}
                                @endif
                            </h4>

                        </div>

                        <div class="content">
                            <div class="form-group">
                                <label>
                                    Company / Organization
                                </label>

                                <input class="form-control"
                                       type="text"
                                       name="company"
                                       value="{{ (old('company') ? old('company') : $item->company) }}">

                                @if($errors->has('company'))
                                    {!! formError($errors->first('company')) !!}
                                @endif
                            </div>

                            <div class="form-group">
                                <label>
                                    Close Date
                                </label>

                                <input class="form-control"
                                       type="text"
                                       name="close_on"
                                       value="{{ (old('close_on') ? old('close_on') : $item->close_on) }}">

                                @if($errors->has('close_on'))
                                    {!! formError($errors->first('close_on')) !!}
                                @endif
                            </div>
                            <div class="form-group">
                                <label>
                                    Description

                                    @if($errors->has('description'))
                                        {!! formError($errors->first('description')) !!}
                                    @endif
                                </label>

                                <textarea class="textEditor" name="description">{{ $item->description }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">
                                Categories

                                {{--category_id set in category-list.blade.php--}}
                                @if($errors->has('category_id'))
                                    {!! formError($errors->first('category_id')) !!}
                                @endif
                            </h4>
                        </div>

                        <div class="content">
                            @include(backendModuleViewUrl('widgets.job-listing.category-list'))
                        </div>
                    </div>
                </div>

            </div>

            {!! formEditFooter('job-listing/module/'. $module->id) !!}

            {!! closeForm() !!}

        </div>
    </div>

@endsection

@section('style')

    <link href="{{ url('vendors/Zebra_Datepicker/css/default.css') }}" type="text/css" rel="stylesheet" />

@endsection

@section('script')

    <script type="text/javascript" src="{{ url('vendors/Zebra_Datepicker/js/zebra_datepicker.js') }}"></script>
    <script src="{{ url('vendors/jquery.filer/js/jquery.filer.min.js') }}"></script>
    <script>
        $(document).ready(function () {

            $('.filer_input').filer({
                limit: 1,
                maxSize: 3,
                extensions: ['jpg', 'jpeg', 'png', 'gif'],
                changeInput: true,
                showThumbs: true
            });

            $('input[name="close_on"]').Zebra_DatePicker({
                direction: 1
            });

        });
    </script>

@endsection