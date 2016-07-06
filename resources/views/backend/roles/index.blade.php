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
                                    <h4 class="title">Manage User Roles</h4>
                                </div>

                                @if(hasPermission('create-role', $permissions))
                                    <div class="col-md-6">
                                        {!! btnToCreate('roles', 'New Role') !!}
                                    </div>
                                @endif

                            </div>

                        </div>
                        <div class="content table-responsive table-full-width">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th>Role</th>
                                    <th>Description</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($roles as $key => $role)

                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $role->display_name }}</td>
                                        <td>{{ $role->description }}</td>
                                        <td class="text-right">

                                        @if($role->name != 'root')
                                            @if ($role->name != $loggedInUser->role->name && hasPermission('edit-his-own-permission', $permissions))

                                                @if( hasPermission('edit-role', $permissions) )
                                                    {!! btnToEdit('roles', $role->id) !!}
                                                @endif

                                                @if( hasPermission('delete-role', $permissions) )
                                                    {!! btnDelete('roles', $role->id) !!}
                                                @endif

                                            @endif
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
            $('.{!! btnDeleteHtmlClass() !!}}').confirmAction({
                title: {
                    text: 'Deletion confirm!!'
                },
                message: {
                    html: 'You are about to delete a role.<br><br> Are you sure?'
                }
            });
        });
    </script>

@endsection