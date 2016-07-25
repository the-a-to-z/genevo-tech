@extends('backend.layouts.master')

@section('content')

    <div class="content">
        <div class="container-fluid">

            {!! openFormUploadCreate('module/'. $module->id . '/people-profile/store-item') !!}

            <input type="hidden" name="module_id" value="{{ $module->id }}">
            <input type="hidden" name="widget_id" value="{{ $widget->id }}">

            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">
                                <input type="text"
                                       name="name"
                                       class="form-control"
                                       placeholder="Full name..."
                                       autofocus
                                       value="{{ (old('name') ? old('name') : '') }}">

                                @if($errors->has('name'))
                                    {!! formError($errors->first('name')) !!}
                                @endif
                            </h4>

                        </div>

                        <div class="content">
                            <div class="form-group">
                                <label>
                                    Short description

                                    @if($errors->has('short_description'))
                                        {!! formError($errors->first('short_description')) !!}
                                    @endif
                                </label>

                                <textarea name="short_description"
                                          class="form-control">{{ (old('short_description') ? old('short_description') : '') }}</textarea>
                            </div>
                            <div class="form-group">
                                <label>
                                    Description

                                    @if($errors->has('description'))
                                        {!! formError($errors->first('description')) !!}
                                    @endif
                                </label>

                                <textarea class="textEditor" name="description">
                                    {{ (old('description') ? old('description') : '') }}
                                </textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="content">
                            <h4 class="title">
                                Profile photo
                                @if($errors->has('profile_photo'))
                                    {!! formError($errors->first('profile_photo')) !!}
                                @endif
                            </h4>

                            <input type="file" name="profile_photo" class="filer_input">
                        </div>
                    </div>

                    <div class="card">
                        <div class="content">
                            <h4 class="title">Social links</h4>

                            <div class="form-group">
                                <label>Facebook</label>

                                <input type="text" class="form-control" name="facebook_link"
                                       value="{{ (old('facebook_link') ? old('facebook_link') : '') }}">

                                @if($errors->has('facebook_link'))
                                    {!! formError($errors->first('facebook_link')) !!}
                                @endif
                            </div>

                            <div class="form-group">
                                <label>Google Plus</label>

                                <input type="text"
                                       class="form-control"
                                       name="google_link"
                                       value="{{ (old('google_link') ? old('google_link') : '') }}">

                                @if($errors->has('google_link'))
                                    {!! formError($errors->first('google_link')) !!}
                                @endif
                            </div>

                            <div class="form-group">
                                <label>Twitter</label>

                                <input type="text"
                                       class="form-control"
                                       name="twitter_link"
                                       value="{{ (old('twitter_link') ? old('twitter_link') : '') }}">

                                @if($errors->has('twitter_link'))
                                    {!! formError($errors->first('twitter_link')) !!}
                                @endif
                            </div>

                            <div class="form-group">
                                <label>LinkedIn</label>

                                <input type="text"
                                       class="form-control"
                                       name="linkedin_link"
                                       value="{{ (old('linkedin_link') ? old('linkedin_link') : '') }}">

                                @if($errors->has('linkedin_link'))
                                    {!! formError($errors->first('linkedin_link')) !!}
                                @endif
                            </div>

                        </div>
                    </div>

                </div>

            </div>

            {!! formCreateFooter('people-profile/module/'. $module->id) !!}

            {!! closeForm() !!}

        </div>
    </div>

@endsection

@section('style')

    <link href="{{ url('vendors/jquery.filer/css/jquery.filer.css') }}" type="text/css" rel="stylesheet"/>
    <link href="{{ url('vendors/jquery.filer/css/themes/jquery.filer-dragdropbox-theme.css') }}" type="text/css"
          rel="stylesheet"/>

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