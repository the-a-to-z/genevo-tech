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
                                    <h4 class="title">Manage Permissions</h4>
                                </div>

                                @if(hasPermission('create-permission', $permissions))
                                    <div class="col-md-6">
                                        <a href="{{ URL::to(config('constants.backend-url') . 'permissions/create') }}" class="btn btn-primary btn-with-icon pull-right">
                                            <i class="pe-7s-plus"></i> <p>New Permission</p>
                                        </a>
                                    </div>
                                @endif

                            </div>

                        </div>
                        <div class="content table-responsive table-full-width">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th>Permission</th>
                                    <th>Description</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($allPermissions as $key => $permission)

                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $permission->display_name }}</td>
                                        <td>{{ $permission->description }}</td>
                                        <td class="text-right">

                                            @if( hasPermission('edit-permission', $permissions) )
                                            <a href="{{ url( config('constants.backend-url') . 'permissions/' . $permission->id . '/edit') }}" class="btn btn-primary btn-mini">
                                                <i class="fa fa-wrench"></i>
                                            </a>
                                            @endif

                                            @if( hasPermission('delete-permission', $permissions) )
                                            {!! btnDelete('permissions', $permission->id) !!}
                                            @endif
                                        </td>
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

@endsection

@section('script')

    <script src="{{ url('js/jquery.confirm-action.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('.btnSubmitDelete').confirmAction({
                title: {
                    text: 'Deletion confirm!!'
                },
                message: {
                    html: 'You are about to delete a permission.<br><br> Are you sure?'
                }
            });
        });
    </script>

@endsection