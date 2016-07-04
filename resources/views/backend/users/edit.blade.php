@extends('backend.layouts.master')

@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Edit <span class="bold">{{ $user->name }}</span> Profile</h4>
                        </div>
                        <div class="content">
                            {!! Form::model($user, ['method' => 'PATCH', 'action' => ['Backend\UsersController@update', $user->id], 'id' => 'formEditUser']) !!}
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label>Display Name</label>
                                            <input type="text"
                                                   name="name"
                                                   class="form-control"
                                                   placeholder="Enter your name"
                                                   value="{{ ($errors->has('name') ? old('name') : $user->name) }}">

                                            <div class="input-error-message">{{ $errors->first('name') }} &nbsp;</div>
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Email address (This email is used for login)</label>
                                            <input type="email"
                                                   name="email"
                                                   class="form-control"
                                                   placeholder="Email"
                                                   value="{{ ($errors->has('email') ? old('email') : $user->email) }}">

                                            <div class="input-error-message">{{ $errors->first('email') }} &nbsp;</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>
                                                Assign user role to
                                                {{--@if(--}}
                                                   {{--!($user->id == $loggedInUser->id && hasPermission('change-his-own-role', $permissions))--}}
                                                   {{--|| !hasPermission('change-user-role', $permissions)--}}
                                               {{--)--}}
                                                    {{--(<span class="text-danger">You are not allowed to change this user role</span>)--}}
                                                {{--@endif--}}
                                            </label>

                                            @foreach($roles as $role)

                                                {{--
                                                if he is editing his own profile but he has permission to change his own role,
                                                or he has permission to change user role
                                                --}}
                                                @if(
                                                    ($user->id == $loggedInUser->id && hasPermission('change-his-own-role', $permissions))
                                                    || hasPermission('change-user-role', $permissions)
                                                )
                                                    {{--disable role ROOT--}}
                                                    <div class="radio{{ ($role->name == 'root' ? ' disabled' : '') }}">
                                                        <label class="text-transform-default">
                                                            <input type="radio" name="role_id" data-toggle="radio" value="{{ $role->id }}" {{ ($user->role_id == $role->id ? 'checked' : '') }} {{ ($role->name == 'root' ? 'disabled' : '') }}>
                                                            {{ $role->display_name }} {{ ($role->description ? '(' . $role->description . ')' : '') }}
                                                        </label>
                                                    </div>

                                                @else

                                                    <div class="radio disabled">
                                                        <label class="text-transform-default">
                                                            <input disabled type="radio" name="role_id" data-toggle="radio" value="{{ $role->id }}" {{ ($user->role_id == $role->id ? 'checked' : '') }}>
                                                            {{ $role->display_name }} {{ ($role->description ? '(' . $role->description . ')' : '') }}
                                                        </label>
                                                    </div>

                                                @endif

                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-info btn-fill pull-right m-left-5 confirmChangeRole" id="btnSubmit">Update</button>

                                <a href="{{ url(config('constants.backend-url') . 'users') }}" class="btn btn-danger btn-fill pull-right">Cancel</a>

                                <div class="clearfix"></div>

                            {!! Form::close() !!}

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection

@section('script')

    {{--if he is editing his own profile and he's admin--}}
    @if($user->id == $loggedInUser->id || hasPermission('change-his-own-role', $permissions))

    <script src="{{ url('js/jquery.confirm-action.js') }}"></script>
    <script>
        $(document).ready(function () {
            var currentUserRole = "{{ $loggedInUser->role_id }}";

            $('input[name="role_id"]').change(function () {
                $('#btnSubmit').confirmAction({
                    title: {
                        text: 'Attention!'
                    },
                    message: {
                        html: 'You are about to change your own role. If you continue, you will not be able to access some features. <br><br> Are you sure?'
                    },
                    actions: {
                        confirm: {
                            text: 'Continue',
                            callback: function (confirm, cancel) {
                                $('#formEditUser').submit();
                            }
                        }
                    }
                });

            });
//            $('#btnSubmit').click(function () {
//                $('.no-submit-form').removeClass('no-submit-form');
//
//                $('#formEditUser').submit();
//            });

        });
    </script>

    @endif;

@endsection