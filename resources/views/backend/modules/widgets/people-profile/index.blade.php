@extends('backend.layouts.master')

@section('content')

    @define($editWidget = ($widget && (isset($widget->id) ? $widget->id : null) != null))

    <div class="content">
        <div class="container-fluid">

            @if($widget && (isset($widget->id) ? $widget->id : null) != null)
            {!! openFormEdit(config('module.widget.people-profile.url'), $widget->id) !!}
            @else
            {!! openFormCreate(config('module.widget.people-profile.url')) !!}
            @endif

            <input type="hidden" name="module_id" value="{{ $module->id }}">

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">
                                <input type="text"
                                       name="title"
                                       class="form-control"
                                       placeholder="Title..."
                                       autofocus
                                       value="{{ ($widget ? $widget->title : '') }}">
                            </h4>
                        </div>

                        <div class="content">
                            <div class="row">
                                <div class="form-group col-md-3">
                                    <label>Background color</label>
                                    <select name="css_class" class="cd-select">
                                        @define( $cssClass = old('css_class') ? old('css_class') : '')

                                        @if($editWidget)
                                            @define( $cssClass = old('css_class') ? old('css_class') : $widget->css_class)
                                        @endif

                                        <option value=""{{ $cssClass == null ? ' selected': '' }}>
                                            Default
                                        </option>
                                        <option value="gray-bg"{{ $cssClass == 'gray-bg' ? ' selected': '' }}>
                                            Gray
                                        </option>
                                    </select>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea name="description" class="textEditorSmall">{{ ($widget ? $widget->description : '') }}</textarea>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>

            @if($editWidget)
                {!! formEditFooter('modules') !!}
            @else
                {!! formCreateFooter('modules') !!}
            @endif

            {!! closeForm() !!}

            @if($editWidget)
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">

                            <div class="row">
                                <div class="col-md-12">
                                    {!! btnToCreate('module/' . $module->id . '/people-profile/create-item', 'New profile', false) !!}
                                </div>
                            </div>
                            <hr>
                        </div>

                        <div class="content">

                            <div class="content slideshow">

                                <div class="row image-grid">
                                    @if($items)
                                        @foreach($items as $item)
                                            <div class="col-md-4 col-sm-6 col-lg-3">
                                                <div class="image-grid-item">
                                                    <div class="image-grid-image">
                                                        <img src="{{ uploadUrl('people-profile/'. $item->profile_photo) }}" alt="" />
                                                    </div>
                                                    <div class="image-grid-title">
                                                        {{ $item->name }}

                                                        {!! btnToEdit('module/' . $module->id . '/people-profile/item', $item->id) !!}

                                                        {!! btnDelete('module/' . $module->id. '/people-profile/delete-item', $item->id) !!}

                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>

                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            @endif

        </div>
    </div>

@endsection

@section('style')

    <link href="{{ url('css/image-grid.css') }}" type="text/css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ url('vendors/SimpleDropDownEffects/css/basic.css') }}">

@endsection

@section('script')

    <script src="{{  url('vendors/SimpleDropDownEffects/js/modernizr.custom.63321.js')  }}"></script>
    <script src="{{  url('vendors/SimpleDropDownEffects/js/jquery.dropdown.js')  }}"></script>
    <script src="{{ url('js/jquery.confirm-action.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('.image-grid-item .{!! btnDeleteHtmlClass() !!}').confirmAction({
                title: {
                    text: 'Deletion confirm!!'
                },
                message: {
                    html: 'You are about to delete an item.<br><br> Are you sure?'
                }
            });

            $('.cd-select').each(function () {
                $(this).dropdown({
                    gutter: 0,
                    stack: false
                });
            });
        });
    </script>

@endsection