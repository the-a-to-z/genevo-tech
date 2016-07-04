@extends('backend.layouts.master')

@section('content')

    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">New menu</h4>
                        </div>
                        <div class="content">

                            {!! openFormCreate('menus') !!}

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text"
                                                   name="slug"
                                                   class="form-control text-lowercase"
                                                   autofocus
                                                   value="{{ (old('slug') ? old('slug') : '') }}"
                                            >

                                            <div class="input-error-message">{{ $errors->first('name') }}&nbsp;</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Display Name</label>
                                            <input type="text"
                                                   name="name"
                                                   class="form-control"
                                                   value="{{ (old('name') ? old('name') : '') }}"
                                            >

                                            <div class="input-error-message">{{ $errors->first('display_name') }}
                                                &nbsp;</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Icon</label>
                                            <input type="text"
                                                   name="css_icon_class"
                                                   class="form-control"
                                                   value="{{ (old('css_icon_class') ? old('css_icon_class') : '') }}"
                                            >
                                            <div class="input-error-message">{{ $errors->first('css_icon_class') }} &nbsp;</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Choose Menu Position</label>

                                            <select name="menu_position_id" class="form-control">
                                                <option></option>

                                                @foreach($allMenuPositions as $menuPosition)
                                                    <option {{ (old('menu_position_id') == $menuPosition->id ? 'selected' : '') }} value="{{ $menuPosition->id }}">
                                                        {{ $menuPosition->display_name }}
                                                    </option>
                                                @endforeach

                                            </select>

                                            <div class="input-error-message">{{ $errors->first('menu_position_id') }}
                                                &nbsp;</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Choose Menu Site</label>

                                            <select name="menu_site_id" class="form-control">
                                                <option></option>

                                                @foreach($allMenuSites as $menuSite)
                                                    <option {{ (old('menu_site_id') == $menuSite->id ? 'selected' : '') }} value="{{ $menuSite->id }}">{{ $menuSite->display_name }}</option>
                                                @endforeach

                                            </select>

                                            <div class="input-error-message">{{ $errors->first('menu_site_id') }}
                                                &nbsp;</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Choose Permission</label>

                                            <select name="permission_id" class="form-control">
                                                <option></option>

                                                @foreach($allPermissions as $permission)
                                                    <option {{ (old('permission_id') == $permission->id ? 'selected' : '') }} value="{{ $permission->id }}">{{ $permission->display_name }}</option>
                                                @endforeach

                                            </select>

                                            <div class="input-error-message">{{ $errors->first('permission_id') }}
                                                &nbsp;</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Description</label>

                                            <textarea rows="5" class="form-control" name="description">{{ (old('description') ? old('description') : '') }}</textarea>

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

                            {!! closeForm() !!}

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection