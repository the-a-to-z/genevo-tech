@extends('backend.layouts.master')

@section('content')

    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">New module</h4>
                        </div>
                        <div class="content">

                            {!! openFormCreate('modules') !!}

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text"
                                                   name="name"
                                                   class="form-control text-lowercase"
                                                   autofocus
                                                   value="{{ (old('name') ? old('name') : '') }}"
                                            >

                                            {!! formError($errors->first('name')) !!}
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Display Name</label>
                                            <input type="text"
                                                   name="display_name"
                                                   class="form-control"
                                                   value="{{ (old('display_name') ? old('display_name') : '') }}"
                                            >

                                            {!! formError($errors->first('display_name')) !!}
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Description {!! formError($errors->first('description')) !!}</label>

                                            <textarea rows="5" class="form-control" name="description">{{ (old('description') ? old('description') : '') }}</textarea>

                                        </div>
                                    </div>
                                </div>

                            {!! formCreateFooter('modules') !!}

                            {!! closeForm() !!}

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection