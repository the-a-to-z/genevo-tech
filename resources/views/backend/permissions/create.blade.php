@extends('backend.layouts.master')

@section('content')

    <div class="content">
        <div class="container-fluid">

            {!! openFormCreate('permissions') !!}

            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">New permission</h4>
                        </div>
                        <div class="content">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text"
                                               name="name"
                                               class="form-control"
                                               autofocus
                                        >
                                        {!! formError($errors->first('name')) !!}
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
                                        {!! formError($errors->first('display_name')) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Description {!! formErrorInline($errors->first('description')) !!}</label>

                                        <textarea rows="5" class="form-control" name="description"></textarea>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            {!! formCreateFooter('permissions') !!}

            {!! closeForm() !!}

        </div>
    </div>

@endsection