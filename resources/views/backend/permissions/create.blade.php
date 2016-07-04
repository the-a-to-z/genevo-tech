@extends('backend.layouts.master')

@section('content')

    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">New permission</h4>
                        </div>
                        <div class="content">

                            <form role="form" method="POST" action="{{ url(config('constants.backend-url') . 'permissions') }}">

                                {{ csrf_field() }}

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text"
                                                   name="name"
                                                   class="form-control"
                                                   autofocus
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

                                            <textarea rows="5" class="form-control" name="description"></textarea>

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

                            </form>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection