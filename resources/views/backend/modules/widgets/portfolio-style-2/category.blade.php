@extends('backend.layouts.master')

@section('content')

    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">New category</h4>
                        </div>

                        <div class="content">
                            {!! openFormCreate('module/' . $module->id . '/portfolio-style-2/createCategory') !!}
                            <div class="row">
                                <div class="col-md-12">

                                    <input type="hidden" name="module_id" value="{{ $module->id }}">

                                    <div class="form-group">
                                        <input type="text" name="name" class="form-control" placeholder="Category name">

                                        {!! formError($errors->first('name')) !!}

                                    </div>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="pull-right">
                                        <button type="submit" class="btn btn-info btn-fill pull-right">Create</button>
                                    </div>
                                </div>
                            </div>

                            {!! closeForm() !!}

                            <div class="clearfix"></div>

                        </div>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">All category</h4>
                        </div>

                        <div class="content">
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th style="width: 40px"></th>
                                        <th>Name</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($categories as $key => $category)

                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            <td>{{ $category->display_name }}</td>
                                            <td class="text-right">{!! btnDelete('afdaf', null) !!}</td>
                                        </tr>

                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

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