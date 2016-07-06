@extends('backend.layouts.master')

@section('content')

    <div class="content">
        <div class="container-fluid">

            {!! openFormEdit('permissions', $permission->id) !!}

            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Edit permission {{ $permission->display_name }}</h4>
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
                                                   value="{{ ($errors->has('name') ? old('name') : $permission->name) }}"
                                                   readonly
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
                                                   value="{{ ($errors->has('display_name') ? old('display_name') : $permission->display_name) }}"
                                            >

                                            {!! formError($errors->first('display_name')) !!}
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Description {!! formErrorInline($errors->first('description')) !!}</label>

                                            <textarea rows="5" class="form-control" name="description">{{ ($errors->has('description') ? old('description') : $permission->description) }}</textarea>
                                        </div>
                                    </div>
                                </div>

                        </div>
                    </div>
                </div>
            </div>

            {!! formEditFooter('permissions') !!}

            {!! closeForm() !!}

        </div>
    </div>

@endsection