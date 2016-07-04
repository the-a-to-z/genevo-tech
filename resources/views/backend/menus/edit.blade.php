@extends('backend.layouts.master')

@section('content')

    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Edit permission {{ $permission->display_name }}</h4>
                        </div>
                        <div class="content">

                            {!! Form::model($permission, ['method' => 'PATCH', 'action' => ['Backend\PermissionsController@update', $permission->id]]) !!}

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text"
                                                   name="name"
                                                   class="form-control"
                                                   autofocus
                                                   value="{{ ($errors->has('name') ? old('name') : $permission->name) }}"
                                                   readonly
                                            >

                                            <div class="input-error-message">{{ $errors->first('name') }}&nbsp;</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Display Name</label>
                                            <input type="display_name"
                                                   name="display_name"
                                                   class="form-control"
                                                   value="{{ ($errors->has('display_name') ? old('display_name') : $permission->display_name) }}"
                                            >

                                            <div class="input-error-message">{{ $errors->first('display_name') }}
                                                &nbsp;</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Description</label>

                                            <textarea rows="5" class="form-control" name="description">{{ ($errors->has('description') ? old('description') : $permission->description) }}</textarea>

                                            <div class="input-error-message">{{ $errors->first('description') }}
                                                &nbsp;
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="submit"
                                                class="btn btn-info btn-fill pull-right m-left-5"
                                                id="btnSubmit">Save
                                        </button>

                                        <a href="{{ url(config('constants.backend-url') . 'users') }}"
                                           class="btn btn-danger btn-fill pull-right">Cancel</a>
                                    </div>
                                </div>

                                <div class="clearfix"></div>

                            {!! Form::close() !!}

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection