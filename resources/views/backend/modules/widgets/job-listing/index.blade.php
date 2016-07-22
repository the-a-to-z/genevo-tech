@extends('backend.layouts.master')

@section('style')
    <link rel="stylesheet" href="{{ url('vendors/SimpleDropDownEffects/css/basic.css') }}">
@endsection

@section('script')
    <script src="{{  url('vendors/SimpleDropDownEffects/js/modernizr.custom.63321.js')  }}"></script>
    <script src="{{  url('vendors/SimpleDropDownEffects/js/jquery.dropdown.js')  }}"></script>
    <script>
        $( function() {

            $('.cd-select').each(function () {
                $(this).dropdown({
                    gutter: 0,
                    stack: false
                });
            });

        });

    </script>
@endsection

@section('content')

    @define($editWidget = ($widget && (isset($widget->id) ? $widget->id : null) != null))

    <div class="content">
        <div class="container-fluid">

            @if($widget && (isset($widget->id) ? $widget->id : null) != null)
            {!! openFormEdit(config('module.widget.job-listing.url'), $widget->id) !!}
            @else
            {!! openFormCreate(config('module.widget.job-listing.url')) !!}
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
                                    <div class="form-group form-inline">
                                        <select name="css_class" class="cd-select">
                                            @define( $theme = old('theme') ? old('theme') : '')

                                            @if($editWidget)
                                                @define( $theme = old('theme') ? old('theme') : $widget->theme)
                                            @endif

                                            <option value=""{{ $theme == null ? ' selected': '' }}>
                                                Background Default
                                            </option>
                                            <option value="gray-bg"{{ $theme == 'grid' ? ' selected': '' }}>
                                                Grid
                                            </option>
                                        </select>
                                    </div>

                                    <div class="form-group form-inline">
                                        <select name="css_class" class="cd-select">
                                            @define( $cssClass = old('css_class') ? old('css_class') : '')

                                            @if($editWidget)
                                                @define( $cssClass = old('css_class') ? old('css_class') : $widget->css_class)
                                            @endif

                                            <option value=""{{ $cssClass == null ? ' selected': '' }}>
                                                Background Default
                                            </option>
                                            <option value="gray-bg"{{ $cssClass == 'gray-bg' ? ' selected': '' }}>
                                                Gray
                                            </option>
                                        </select>
                                    </div>

                                    <div class="form-group form-inline p-left-15">
                                        <select name="show_category_filter" class="cd-select">

                                            @define( $showCategoryFilter = old('show_category_filter') ? old('show_category_filter') : '')

                                            @if($editWidget)
                                                @define( $showCategoryFilter = old('show_category_filter') ? old('show_category_filter') : $widget->show_category_filter)
                                            @endif

                                            <option value="1"{{ $showCategoryFilter == '1' ? ' selected': '' }}>
                                                Show Category
                                            </option>
                                            <option value="0"{{ $showCategoryFilter == '0' ? ' selected': '' }}>
                                                Hide Category
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
                                    {!! btnToCreate('module/' . $module->id . '/job-listing/create-item', 'New job', false) !!}

                                    <a href="{{ backendUrl('module/' . $module->id . '/job-listing/category') }}" class="btn btn-fill btn-with-icon pull-right btnToCreate">
                                        <i class="pe-7s-ticket"></i> <p>New category</p>
                                    </a>
                                </div>
                            </div>
                            <hr>
                        </div>

                        <div class="content">

                            @if($items)
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th></th>
                                        <th>Job Title</th>
                                        <th>Company</th>
                                        <th>Close On</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($items as $key => $item)

                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            <td>
                                                {{ $item->job_title }}
                                            </td>
                                            <td>
                                                {{ $item->company }}
                                            </td>
                                            <td>
                                                @if($item->close_on > addDay(1, date('Y-m-d')))
                                                    {{ displayDate($item->close_on) }}
                                                @elseif($item->close_on >= addDay(1, date('Y-m-d')))
                                                    <span class="text-warning">{{ displayDate($item->close_on) }}</span>
                                                @else
                                                    <span class="text-danger">{{ displayDate($item->close_on) }}</span>
                                                @endif
                                            </td>
                                            <td class="text-right">
                                                {!! btnToEdit('module/' . $module->id . '/job-listing/item', $item->id) !!}

                                                {!! btnDelete('module/' . $module->id. '/job-listing/delete-item', $item->id) !!}
                                            </td>
                                        </tr>

                                    @endforeach

                                    </tbody>
                                </table>

                            </div>

                            @endif

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