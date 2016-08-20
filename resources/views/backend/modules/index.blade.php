@extends('backend.layouts.master')

@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4 class="title">Manage Modules</h4>
                                </div>

                                @if(hasPermission('create-module', $permissions))
                                    <div class="col-md-6">
                                        {!! btnToCreate('modules', 'New Module') !!}
                                    </div>
                                @endif

                            </div>

                        </div>
                        <div class="content table-responsive table-full-width  has-datatable">
                            <table class="table table-hover" id="modules-table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Display Name</th>
                                    <th>Name</th>
                                    <th>Created At</th>
                                    <th></th>
                                </tr>
                                </thead>
                            </table>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

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
                    html: 'You are about to delete a module.<br><br>This module will also be deleted from any page. <br><br> Are you sure?'
                }
            });

            /*
             * Create modules datatable
             */
            $('#modules-table').DataTable({
                processing: true,
                serverSide: true,
                order: [[ 0, "desc" ]],
                ajax: '{!! backendUrl('modules/data') !!}',
                columns: [
                    {data: 'id'},
                    {data: 'display_name'},
                    {data: 'name'},
                    {data: 'created_at'},
                    {
                        data: null,
                        className: 'text-right',
                        sortable: false,
                        render: function (data, type, full, meta) {
                            var btn = " ";

                            @if( hasPermission('edit-module', $permissions) )
                                btn += helper.btnToEdit(data.widget_name + '/module/' + data.id);
                            @endif

                            @if( hasPermission('delete-module', $permissions) )
                                btn += ' ' + helper.btnDelete('modules', data.id);
                            @endif

                            return btn;
                        }
                    }
                ]
            });
        });
    </script>

@endsection