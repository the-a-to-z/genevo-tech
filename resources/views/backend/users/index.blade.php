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
                                    <h4 class="title">Manage Users</h4>
                                </div>

                                @if(hasPermission('create-user', $permissions))
                                    <div class="col-md-6">
                                        <a href="{{ URL::to(config('constants.backend-url') . 'users/create') }}" class="btn btn-primary btn-with-icon pull-right">
                                            <i class="pe-7s-add-user"></i> <p>New User</p>
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
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($users as $key => $user)

                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->role->display_name }}</td>
                                        <td class="text-right">

                                        @if($user->role->name != 'root')
                                            @if( hasPermission('edit-user', $permissions) )
                                                <a href="{{ url( config('constants.backend-url') . 'users/' . $user->id . '/edit') }}" class="btn btn-primary btn-mini">
                                                    <i class="fa fa-wrench"></i>
                                                </a>
                                            @endif

                                            @if( hasPermission('delete-user', $permissions))
                                                {!! btnDelete('users', $user->id, $user->role->name == 'root') !!}
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
            $('.btnSubmitDelete').confirmAction({
                title: {
                    text: 'Deletion confirm!!'
                },
                message: {
                    html: 'You are about to delete a user.<br><br> Are you sure?'
                }
            });
        });
    </script>

@endsection