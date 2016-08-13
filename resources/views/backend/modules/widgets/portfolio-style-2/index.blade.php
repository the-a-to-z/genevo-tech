@extends('backend.layouts.master')

@section('content')

    @define($editWidget = ($widget && (isset($widget->id) ? $widget->id : null) != null))

    <div class="content">
        <div class="container-fluid">

            @if($widget && (isset($widget->id) ? $widget->id : null) != null)
            {!! openFormEdit(config('module.widget.portfolio-style-2.url'), $widget->id) !!}
            @else
            {!! openFormCreate(config('module.widget.portfolio-style-2.url')) !!}
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
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group col-md-3">
                                        <label for="">Background color</label>
                                        <select name="css_class" class="cd-select">
                                            @define( $cssClass = old('css_class') ? old('css_class') : '')

                                            @if($editWidget)
                                                @define( $cssClass = old('css_class') ? old('css_class') : $widget->css_class)
                                            @endif

                                            <option value=""{{ $cssClass == false ? ' selected': '' }}>
                                                Default
                                            </option>
                                            <option value="gray-bg"{{ $cssClass == 'gray-bg' ? ' selected': '' }}>
                                                Gray
                                            </option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="">Display</label>
                                        <select name="display_per_column" class="cd-select">

                                            @define( $displayPerColumn = old('display_per_column') ? old('display_per_column') : '')

                                            @if($editWidget)
                                                @define( $displayPerColumn = old('display_per_column') ? old('display_per_column') : $widget->display_per_column)
                                            @endif

                                            <option value="4"{{ $displayPerColumn == false || $displayPerColumn == 4 ? ' selected': '' }}>
                                                4 per row
                                            </option>
                                            <option value="3"{{ $displayPerColumn == 3 ? ' selected': '' }}>
                                                3 per row
                                            </option>
                                            <option value="2"{{ $displayPerColumn == 2 ? ' selected': '' }}>
                                                2 per row
                                            </option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="">Space between item</label>
                                        <select name="display_item_wide" class="cd-select">

                                            @define( $displayWide = old('display_item_wide') ? old('display_item_wide') : '')

                                            @if($editWidget)
                                                @define( $displayWide = old('display_item_wide') ? old('display_item_wide') : $widget->display_item_wide)
                                            @endif

                                            <option value=""{{ $displayWide == false ? ' selected': '' }}>
                                                No
                                            </option>
                                            <option value="1"{{ $displayWide == '1' ? ' selected': '' }}>
                                                Yes
                                            </option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="">Show category</label>
                                        <select name="show_category_filter" class="cd-select">

                                            @define( $showCategoryFilter = old('show_category_filter') ? old('show_category_filter') : '')

                                            @if($editWidget)
                                                @define( $showCategoryFilter = old('show_category_filter') ? old('show_category_filter') : $widget->show_category_filter)
                                            @endif

                                            <option value="1"{{ $showCategoryFilter == '1' ? ' selected': '' }}>
                                                Yes
                                            </option>
                                            <option value=""{{ $showCategoryFilter == false ? ' selected': '' }}>
                                                No
                                            </option>
                                        </select>
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
                                    {!! btnToCreate('module/' . $module->id . '/portfolio-style-2/create-item', 'New item', false) !!}

                                    <a href="{{ backendUrl('module/' . $module->id . '/portfolio-style-2/category') }}" class="btn btn-fill btn-with-icon pull-right btnToCreate">
                                        <i class="pe-7s-ticket"></i> <p>New category</p>
                                    </a>
                                </div>
                            </div>
                            <hr>
                        </div>

                        <div class="content">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="content slideshow">

                                        <div class="row image-grid">
                                            @if($items)
                                                @foreach($items as $item)
                                                    <div class="col-md-4 col-sm-6 col-lg-3">
                                                        <div class="image-grid-item">
                                                            <div class="image-grid-image">
                                                                @if($item->youtube_video)
                                                                    <img src="{{ getYoutubeImageThumbnailUrl($item->youtube_video) }}" alt="" />
                                                                @else
                                                                    <img src="{{ uploadUrl('portfolio-style-2/'. $item->image) }}" alt="" />
                                                                @endif
                                                            </div>
                                                            <div class="image-grid-title">
                                                                {{ $item->title }}

                                                                {!! btnToEdit('module/' . $module->id . '/portfolio-style-2/item', $item->id) !!}

                                                                {!! btnDelete('module/' . $module->id. '/portfolio-style-2/delete-item', $item->id) !!}

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
                </div>

            </div>
            @endif

        </div>
    </div>

@endsection

@section('style')

    <link rel="stylesheet" href="{{ url('vendors/SimpleDropDownEffects/css/basic.css') }}">
    <link href="{{ url('css/image-grid.css') }}" type="text/css" rel="stylesheet" />

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