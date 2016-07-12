@extends('backend.layouts.master')

@section('content')

    <div class="content">
        <div class="container-fluid">

            @if($data && (isset($data->id) ? $data->id : null) != null)
            {!! openFormEdit(config('module.widget.portfolio-style-1.url'), $data->id) !!}
            @else
            {!! openFormCreate(config('module.widget.portfolio-style-1.url')) !!}
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
                                       value="{{ ($data ? $data->title : '') }}">
                            </h4>
                        </div>

                        <div class="content">
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="pull-right">
                                        <div class="form-group form-inline">
                                            <label>Background Color </label>

                                            <select name="css_class" class="form-control">
                                                <option value="">Default</option>
                                                <option value="gray-bg">Gray</option>
                                            </select>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>

            @if($data && (isset($data->id) ? $data->id : null) != null)
                {!! formEditFooter('modules') !!}
            @else
                {!! formCreateFooter('modules') !!}
            @endif

            {!! closeForm() !!}

            @if($data && (isset($data->id) ? $data->id : null) != null)
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <button type="button" class="btn btn-primary btn-fill btn-with-icon" data-toggle="modal" data-target="#modalAddPortfolioItem">
                                <i class="pe-7s-plus"></i>
                                <p>Add new item</p>
                            </button>
                            <hr>
                        </div>

                        <div class="content">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="content slideshow">

                                        <div class="row image-grid">
                                            @foreach($items as $item)
                                                <div class="col-md-4 col-sm-6 col-lg-3">
                                                    <div class="image-grid-item">
                                                        <div class="image-grid-image">
                                                            <img src="{{ uploadUrl('portfolio-style-1/'. $item->image) }}" alt="" />
                                                        </div>
                                                        <div class="image-grid-title">
                                                            {{ $item->title }}

                                                            <button class="btn btn-mini btn-primary btn-fill btnToEdit"
                                                                    data-toggle="modal"
                                                                    data-target="#modalEditPortfolioItem"
                                                                    data-id="{{ $item->id }}"
                                                                    data-title="{{ $item->title }}"
                                                                    data-description="{{ $item->description }}"
                                                            >
                                                                <i class="fa fa-wrench"></i>
                                                            </button>

                                                            {!! btnDelete('module/portfolio-style-1/delete-item', $item->id) !!}

                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
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

@section('modal')

    @include('backend.modules.widgets.portfolio-style-1.modal-add')

    @include('backend.modules.widgets.portfolio-style-1.modal-edit')

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