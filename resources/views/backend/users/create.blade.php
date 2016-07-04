@extends('backend.layouts.master')

@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Add a new user</h4>
                        </div>
                        <div class="content">
                            <form role="form" method="POST" action="{{ url(config('constants.backend-url') . 'users') }}">

                                {{ csrf_field() }}

                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label>Display Name</label>
                                            <input type="text"
                                                   name="name"
                                                   class="form-control"
                                                   placeholder="Enter your name"
                                                   value="{{ (old('name') ? old('name') : '') }}"
                                                   autofocus>

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
                                                   value="{{ (old('email') ? old('email') : '') }}">

                                            <div class="input-error-message">{{ $errors->first('email') }} &nbsp;</div>
                                        </div>
                                    </div>
                                </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password"
                                               name="password"
                                               class="form-control"
                                                {{ $errors->has('email') ? 'autofocus' : ''}}
                                        >

                                        <div class="input-error-message">{{ $errors->first('password') }} &nbsp;</div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Re-type password</label>
                                        <input type="password"
                                               name="password_confirmation"
                                               class="form-control"
                                                {{ $errors->has('password_confirmation') ? 'autofocus' : ''}}
                                        >

                                        <div class="input-error-message">{{ $errors->first('password_confirmation') }} &nbsp;</div>
                                    </div>
                                </div>
                            </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>
                                                Assign user role to
                                                <div class="input-error-message">{{ $errors->first('role_id') }} &nbsp;</div>
                                            </label>

                                            @foreach($roles as $role)

                                                <div class="radio{{ ($role->name == 'root' ? ' disabled' : '') }}">
                                                    <label class="text-transform-default">
                                                        <input type="radio" name="role_id" data-toggle="radio" value="{{ $role->id }}" {{ (old('role_id') ? (old('role_id') == $role->id ? ' checked' : '') : '') }} {{ ($role->name == 'root' ? ' disabled' : '') }}>
                                                        {{ $role->display_name }} {{ ($role->description ? '(' . $role->description . ')' : '') }}
                                                    </label>
                                                </div>

                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-info btn-fill pull-right m-left-5 confirmChangeRole" id="btnSubmit">Update</button>

                                <a href="{{ url(config('constants.backend-url') . 'users') }}" class="btn btn-danger btn-fill pull-right">Cancel</a>

                                <div class="clearfix"></div>

                            </form>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection