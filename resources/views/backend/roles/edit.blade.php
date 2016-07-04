@extends('backend.layouts.master')

@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">

                {!! Form::model($role, ['method' => 'PATCH', 'action' => ['Backend\RolesController@update', $role->id], 'id' => 'formEditRole']) !!}

                <div class="col-md-6">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Edit <span class="bold">{{ $role->display_name }}</span></h4>
                        </div>
                        <div class="content">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Role Name</label>
                                        <input type="text"
                                               name="name"
                                               class="form-control"
                                               placeholder="Enter your name"
                                               value="{{ ($errors->has('name') ? old('name') : $role->name) }}"
                                               readonly
                                        >

                                        <div class="input-error-message">{{ $errors->first('name') }}
                                            &nbsp;</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Display Name</label>
                                        <input type="text"
                                               name="display_name"
                                               class="form-control"
                                               placeholder="Enter your name"
                                               value="{{ ($errors->has('display_name') ? old('display_name') : $role->display_name) }}">

                                        <div class="input-error-message">{{ $errors->first('display_name') }}
                                            &nbsp;</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">
                                            Description
                                                <span class="input-error-message">{{ $errors->first('description') }}
                                                    &nbsp;</span>
                                        </label>

                                            <textarea name="description" rows="5" class="form-control"
                                                      placeholder="Some description..."
                                                      value="Mike">{{ ($errors->has('description') ? old('description') : $role->description) }}</textarea>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Manage Permissions</h4>
                        </div>
                        <div class="content">
                            <div class="table-full-width" id="permissionList">
                                <table class="table table-checkbox">
                                    <tbody>

                                    @foreach($rolePermissions as $rolePermission)

                                        <tr>
                                            <td class="td-only-checkbox">
                                                <label class="checkbox">
                                                    <span class="icons"><span class="first-icon fa fa-square-o"></span><span class="second-icon fa fa-check-square-o"></span></span>
                                                    <input type="checkbox" name="permission_id[]"
                                                           value="{{ $rolePermission->id }}"
                                                           data-toggle="checkbox"
                                                           {{ $rolePermission->role_id ? 'checked' : '' }}
                                                           {{ ($rolePermission->role_name == 'root') ? ' disabled': '' }}
                                                    >
                                                </label>
                                            </td>
                                            <td>
                                                <span {{ ($rolePermission->role_name == 'root') ? ' disabled': '' }}>
                                                {{ $rolePermission->display_name }}
                                                @if($rolePermission->description)
                                                    (<span class="description">{{ $rolePermission->display_name }}</span>)
                                                @endif
                                                </span>
                                            </td>
                                        </tr>

                                    @endforeach

                                    </tbody>
                                </table>
                            </div>

                            <div class="footer">
                                <hr>
                                <a href="{{ url(config('constants.backend-url') . 'permissions/create') }}" class="btn btn-fill btn-primary btn-with-icon">
                                    <i class="pe-7s-plus"></i>
                                    <p>New permission</p>
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="clearfix"></div>

        <footer class="form-fixed-footer">
            <div class="container-fluid">
                <button type="submit"
                        class="btn btn-info btn-fill pull-right m-left-5"
                        id="btnSubmit">Update
                </button>

                <a href="{{ url(config('constants.backend-url') . 'roles') }}"
                   class="btn btn-danger btn-fill pull-right">Cancel</a>
            </div>
        </footer>

        {!! Form::close() !!}

    </div>


@endsection

@section('script')

    {{--if he is editing his own profile and he's admin--}}
    @if($role->id == $loggedInUser->id || hasPermission('change-his-own-permission', $permissions))

        <script src="{{ url('js/jquery.confirm-action.js') }}"></script>
        <script>
            $(document).ready(function () {
                var currentUserRole = "{{ $loggedInUser->role_id }}";

                $('input[name="permission_id[]"]').change(function () {
                    $('#btnSubmit').confirmAction({
                        title: {
                            text: 'Attention!!'
                        },
                        message: {
                            html: 'You are about to change your own permission. If you continue, you will not be able to access some features. <br><br>Logout maybe required.<br><br> Are you sure?'
                        },
                        actions: {
                            confirm: {
                                text: 'Continue',
                                callback: function (confirm, cancel) {
                                    $('#formEditRole').submit();
                                }
                            }
                        }
                    });

                });

            });
        </script>

    @endif;

@endsection