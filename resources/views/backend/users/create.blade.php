@extends('backend.layouts.master')

@section('content')

    <div class="content">
        <div class="container-fluid">

            {!! openFormCreate('users') !!}

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Add a new user</h4>
                        </div>
                        <div class="content">

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

                                        {!! formError($errors->first('name') ) !!}
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

                                        {!! formError($errors->first('email')) !!}
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

                                    {!! formError($errors->first('password')) !!}
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

                                    {!! formError($errors->first('password_confirmation')) !!}
                                </div>
                            </div>
                        </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>
                                            Assign user role to {!! formErrorInline($errors->first('role_id')) !!}
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

                        </div>
                    </div>
                </div>

            </div>

            {!! formCreateFooter('users') !!}

            {!! closeForm() !!}
        </div>
    </div>

@endsection