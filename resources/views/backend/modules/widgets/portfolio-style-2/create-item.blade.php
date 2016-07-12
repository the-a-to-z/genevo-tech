@extends('backend.layouts.master')

@section('content')

    <div class="content">
        <div class="container-fluid">

            {!! openFormUploadCreate('module/'. $module->id . '/portfolio-style-2/store-item') !!}

            <input type="hidden" name="module_id" value="{{ $module->id }}">
            <input type="hidden" name="widget_id" value="{{ $widget->id }}">

            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">
                                <input type="text"
                                       name="title"
                                       class="form-control"
                                       placeholder="Title..."
                                       autofocus
                                       value="{{ (old('title') ? old('title') : '') }}">

                                @if($errors->has('description'))
                                    {!! formError($errors->first('title')) !!}
                                @endif
                            </h4>

                        </div>

                        <div class="content">
                            <div class="form-group">
                                <label>
                                    Description

                                    @if($errors->has('description'))
                                        {!! formError($errors->first('description')) !!}
                                    @endif
                                </label>


                                <textarea class="textEditor" name="description"></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">
                                Image
                                @if($errors->has('photo'))
                                    {!! formError($errors->first('photo')) !!}
                                @endif
                            </h4>
                        </div>

                        <div class="content">
                            <input type="file" name="photo" class="filer_input">
                        </div>
                    </div>

                    <div class="card">
                        <div class="header">
                            <h4 class="title">1
                                Categories

                                {{--category_id set in category-list.blade.php--}}
                                @if($errors->has('category_id'))
                                    {!! formError($errors->first('category_id')) !!}
                                @endif
                            </h4>
                        </div>

                        <div class="content">
                            @include(backendModuleViewUrl('widgets.portfolio-style-2.category-list'))
                        </div>
                    </div>
                </div>

            </div>

            {!! formCreateFooter('portfolio-style-2/module/'. $module->id) !!}

            {!! closeForm() !!}

        </div>
    </div>

@endsection

@section('style')

    <link href="{{ url('vendors/jquery.filer/css/jquery.filer.css') }}" type="text/css" rel="stylesheet" />
    <link href="{{ url('vendors/jquery.filer/css/themes/jquery.filer-dragdropbox-theme.css') }}" type="text/css" rel="stylesheet" />

@endsection

@section('script')

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

        });
    </script>

@endsection