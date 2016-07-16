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
                                    <div class="pull-right">
                                        <div class="form-group form-inline">
                                            <select name="css_class" class="form-control">
                                                @define( $cssClass = old('css_class') ? old('css_class') : '')

                                                @if($editWidget)
                                                    @define( $cssClass = old('css_class') ? old('css_class') : $widget->css_class)
                                                @endif

                                                <option value=""{{ $cssClass == '' ? ' selected': '' }}>
                                                    Background color: Default
                                                </option>
                                                <option value="gray-bg"{{ $cssClass == 'gray-bg' ? ' selected': '' }}>
                                                    Background color: Gray
                                                </option>
                                            </select>
                                        </div>

                                        <div class="form-group form-inline p-left-15">
                                            <select name="show_category_filter" class="form-control">

                                                @define( $showCategoryFilter = old('show_category_filter') ? old('show_category_filter') : '')

                                                @if($editWidget)
                                                    @define( $showCategoryFilter = old('show_category_filter') ? old('show_category_filter') : $widget->show_category_filter)
                                                @endif

                                                <option value="1"{{ $showCategoryFilter == '1' ? ' selected': '' }}>
                                                    Category Filter: Show
                                                </option>
                                                <option value="0"{{ $showCategoryFilter == '0' ? ' selected': '' }}>
                                                    Category Filter:  Hide
                                                </option>
                                            </select>
                                        </div>
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
                                                                <img src="{{ uploadUrl('portfolio-style-2/'. $item->image) }}" alt="" />
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

    <link href="{{ url('vendors/jquery.filer/css/jquery.filer.css') }}" type="text/css" rel="stylesheet" />
    <link href="{{ url('vendors/jquery.filer/css/themes/jquery.filer-dragdropbox-theme.css') }}" type="text/css" rel="stylesheet" />
    <link href="{{ url('css/image-grid.css') }}" type="text/css" rel="stylesheet" />

@endsection

@section('script')

    <script src="{{ url('vendors/jquery.filer/js/jquery.filer.min.js') }}"></script>
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

            /**
             * Upload item
             */
            $('.filer_input').filer({
                limit: 1,
                maxSize: 3,
                extensions: ['jpg', 'jpeg', 'png', 'gif'],
                changeInput: true,
                showThumbs: true
            });

            $('.btnToEdit').click(function () {
                var container = $('#modalEditPortfolioItem');

                container.find('input[name="title"]').val($(this).data('title'))
                container.find('input[name="id"]').val($(this).data('id'));

                $('#editPortfolioImagePreview').html($(this).closest('.image-grid-item').find('img').clone());

                tinymce.get('portFolioItemDescription').setContent($(this).data('description'));
            });
        });
    </script>

@endsection