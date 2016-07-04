@extends('backend.layouts.master')

@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">

                <form role="form" method="POST" action="{{ url(config('constants.backend-url') . 'roles') }}">

                    {{ csrf_field() }}

                    <div class="col-md-6">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">New Role</h4>
                            </div>
                            <div class="content">

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Role Name</label>
                                            <input type="text"
                                                   name="name"
                                                   class="form-control"
                                                   autofocus
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
                                                   class="form-control">

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
                                                      placeholder="Some description..." value="Mike"></textarea>

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
                                                        <span class="icons">
                                                            <span class="first-icon fa fa-square-o"></span>
                                                            <span class="second-icon fa fa-check-square-o"></span>
                                                        </span>
                                                        <input type="checkbox" name="permission_id[]"
                                                               value="{{ $rolePermission->id }}"
                                                               data-toggle="checkbox"
                                                        >
                                                    </label>
                                                </td>
                                                <td>
                                                    {{ $rolePermission->display_name }}
                                                    @if($rolePermission->description)
                                                        (
                                                        <span class="description">{{ $rolePermission->display_name }}</span>
                                                        )
                                                    @endif
                                                </td>
                                            </tr>

                                        @endforeach

                                        </tbody>
                                    </table>
                                </div>

                                <div class="footer">
                                    <hr>
                                    <a href="{{ url(config('constants.backend-url') . 'permissions/create') }}"
                                       class="btn btn-fill btn-primary btn-with-icon">
                                        <i class="pe-7s-plus"></i>
                                        <p>New permission</p>
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>


                    <div class="clearfix"></div>

                    <footer class="form-fixed-footer">
                        <div class="container-fluid">
                            <button type="submit"
                                    class="btn btn-info btn-fill pull-right m-left-5 confirmChangeRole"
                                    id="btnSubmit">Save
                            </button>

                            <a href="{{ url(config('constants.backend-url') . 'roles') }}"
                               class="btn btn-danger btn-fill pull-right">Cancel</a>
                        </div>
                    </footer>

                </form>

            </div>
        </div>
    </div>

@endsection