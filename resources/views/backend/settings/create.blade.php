@extends('backend.layouts.master')

@section('content')

    <div class="content">
        <div class="container-fluid">

            {!! openFormCreate('menus') !!}

            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">New menu</h4>
                        </div>
                        <div class="content">

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

                                        {!! formError($errors->first('name')) !!}
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

                                        {!! formError($errors->first('name')) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Icon</label>

                                        {!! buttonChooseIcon('css_icon_class', (old('css_icon_class') ? old('css_icon_class') : '')) !!}

                                        {!! formError($errors->first('css_icon_class')) !!}
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

                                        {!! formError($errors->first('menu_position_id')) !!}
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

                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Permission and Site</h4>
                        </div>
                        <div class="content">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">

                                        @foreach($allMenuSites as $menuSite)

                                            <div class="radio form-inline m-right-30">
                                                <label class="text-transform-default">
                                                    <input type="radio"
                                                           name="menu_site_id"
                                                           data-toggle="radio"
                                                           value="{{ $menuSite->id }}"
                                                           data-name="{{ $menuSite->name }}"
                                                           {{ (old('menu_site_id') ? (old('menu_site_id') == $menuSite->id ? ' checked' : '') : '') }}>
                                                    {{ $menuSite->display_name }}
                                                </label>
                                            </div>

                                        @endforeach

                                        {!! formError($errors->first('menu_site_id')) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="row" id="permissionListContainer">
                                <div class="header">
                                    <h4 class="title">Choose a permission for the menu</h4>
                                </div>
                                <div class="col-md-12">
                                    <div class="table-full-width" id="permissionList">
                                        <table class="table table-checkbox">
                                            <tbody>

                                            @foreach($allPermissions as $permission)

                                                <tr>
                                                    <td class="td-only-checkbox">
                                                        <label class="radio">
                                                            <span class="icons">
                                                                <span class="first-icon fa fa-circle-o"></span>
                                                                <span class="second-icon fa fa-dot-circle-o"></span>
                                                            </span>
                                                            <input type="radio" name="permission_id"
                                                                   value="{{ $permission->id }}"
                                                                   data-toggle="radio"
                                                            >
                                                        </label>
                                                    </td>
                                                    <td>
                                                        {{ $permission->display_name }}
                                                        @if($permission->description)
                                                            (
                                                            <span class="description">{{ $permission->display_name }}</span>
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
                                        <div class="row">
                                            <div class="col-md-12">
                                                {!! btnToCreate('permissions', 'New permission') !!}
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

            {!! formCreateFooter('menus') !!}

            {!! closeForm() !!}

        </div>
    </div>

@endsection

@section('script')

    <script>
        $(document).ready(function () {
            $('input[name="menu_site_id"]').change(function () {
                if($('input[name="menu_site_id"]:checked').data('name') == 'backend') {
                    $('#permissionListContainer').slideDown();
                } else {
                    $('#permissionListContainer').slideUp();
                }
            });
        });
    </script>

@endsection