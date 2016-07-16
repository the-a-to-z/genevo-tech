@extends('backend.layouts.master')

@section('content')

    <div class="content">
        <div class="container-fluid">

            <div class="row">

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
                                            <td class="text-right">

                                                <button type="button"
                                                        class="btn btn-primary btn-mini btnToEdit"
                                                        data-toggle="modal"
                                                        data-target="#modalEditCategory"
                                                        data-id="{{ $category->id }}"
                                                        data-display-name="{{ $category->display_name }}"
                                                >
                                                    <i class="fa fa-wrench"></i>
                                                </button>

                                                {!! btnDelete('module/' . $module->id . '/portfolio-style-2/category', $category->id) !!}
                                            </td>
                                        </tr>

                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">New category</h4>
                        </div>

                        <div class="content">
                            {!! openFormCreate('module/' . $module->id . '/portfolio-style-2/category') !!}
                            <div class="row">
                                <div class="col-md-12">

                                    <input type="hidden" name="module_id" value="{{ $module->id }}">
                                    <input type="hidden" name="widget_id" value="{{ $widget->id }}">

                                    <div class="form-group">
                                        <input type="text" name="display_name" class="form-control" placeholder="Category name">

                                        {!! formError($errors->first('display_name')) !!}

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

            </div>

        </div>
    </div>

@endsection

@section('modal')

    <form data-action="{{ backendUrl('module/' . $module->id .'/portfolio-style-2/category') }}"
          id="formEditCategory"
          method="post"
          enctype="multipart/form-data">

        {{ csrf_field() }}

        {!! method_field('patch') !!}

        <div class="modal fade modal-mid" id="modalEditCategory" tabindex="-1" role="dialog" aria-labelledby="modalEditCategoryLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title" id="modalEditCategoryLabel">Edit category</h4>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="module_id" value="{{ $module->id }}">
                        <input type="hidden" name="widget_id" value="{{ $widget->id }}">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>New name</label>
                                    <input type="text" name="display_name" class="form-control">
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-fill" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-fill">Done</button>
                    </div>
                </div>
            </div>
        </div>

    </form>

@endsection

@section('script')

    <script src="{{ url('js/jquery.confirm-action.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('.{!! btnDeleteHtmlClass() !!}').confirmAction({
                title: {
                    text: 'Deletion confirm!!'
                },
                message: {
                    html: 'You are about to delete a category. <br><br>' +
                    '<p class="bold">Please be sure this category is not being used by an item.</p><br> Are you sure?'
                }
            });

            $('.btnToEdit').click(function (e) {
                e.preventDefault();

                var modal = $('#modalEditCategory');
                var form = $('#formEditCategory');

                form.attr('action', form.data('action') + '/' + $(this).data('id'));
                modal.find('input[name="display_name"]').val($(this).data('display-name'));
            });

        });
    </script>

@endsection