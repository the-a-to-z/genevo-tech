@extends('backend.layouts.master')

@section('content')

    <div class="content">
        <div class="container-fluid">

            {!! openFormEdit('menus', $menu->id) !!}

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
                                        <label>Slug</label>
                                        <input type="text"
                                               name="slug"
                                               class="form-control text-lowercase"
                                               autofocus
                                               value="{{ (old('slug') ? old('slug') : $menu->slug) }}"
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
                                               value="{{ (old('name') ? old('name') : $menu->name) }}"
                                        >

                                        {!! formError($errors->first('name')) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Icon</label>

                                        {!! buttonChooseIcon('css_icon_class', (old('css_icon_class') ? old('css_icon_class') : $menu->css_icon_class)) !!}

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
                                                <option {{ ((old('menu_position_id') ? old('menu_position_id')  : $menu->menu_position_id) == $menuPosition->id ? 'selected' : '') }}
                                                        value="{{ $menuPosition->id }}">
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

                                        <textarea rows="5" class="form-control" name="description">{{ (old('description') ? old('description') : $menu->description ) }}</textarea>
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
                                                            {{ (old('menu_site_id') ? old('menu_site_id') : $menu->menu_site_id ) == $menuSite->id ? ' checked' : '' }}>
                                                    {{ $menuSite->display_name }}
                                                </label>
                                            </div>

                                        @endforeach

                                        {!! formError($errors->first('menu_site_id')) !!}
                                    </div>
                                </div>
                            </div>

                            {{--Menu link--}}
                            <div class="row" id="selectMenuLink">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Link menu to</label>
                                        <div>
                                            <div class="radio form-inline m-right-30">
                                                <label class="text-transform-default">
                                                    <input type="radio"
                                                           name="link_menu_to"
                                                           data-toggle="radio"
                                                           value="page"
                                                           data-name="link_to_menu"
                                                        @if(old('link_menu_to'))
                                                            {{ (old('link_menu_to') == 'page') ? 'checked' : '' }}
                                                        @else
                                                            {{ ($menu->page_id) ? 'checked' : '' }}
                                                        @endif
                                                    >
                                                    Page
                                                </label>
                                            </div>

                                            <div class="radio form-inline m-right-30">
                                                <label class="text-transform-default">
                                                    <input type="radio"
                                                           name="link_menu_to"
                                                           data-toggle="radio"
                                                           value="module"
                                                           data-name="link_menu_to"
                                                           @if(old('link_menu_to'))
                                                                {{ (old('link_menu_to') == 'module') ? 'checked' : '' }}
                                                           @else
                                                               {{ ($menu->module_id) ? 'checked' : '' }}
                                                           @endif
                                                    >
                                                    Module
                                                </label>
                                            </div>

                                            <div class="radio form-inline m-right-30">
                                                <label class="text-transform-default">
                                                    <input type="radio"
                                                           name="link_menu_to"
                                                           data-toggle="radio"
                                                           value="url"
                                                           data-name="link_menu_to"
                                                            @if(old('link_menu_to'))
                                                                {{ (old('link_menu_to') == 'url') ? 'checked' : '' }}
                                                            @else
                                                                {{ ($menu->url) ? 'checked' : '' }}
                                                            @endif
                                                    >
                                                    Url
                                                </label>
                                            </div>

                                        </div>

                                        {!! formError($errors->first('link_menu_to')) !!}
                                    </div>
                                </div>
                            </div>
                            {{--Menu link--}}

                            {{--Permission list--}}
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
                                                                   {{ (old('permission_id') ? old('permission_id') : $menu->permission_id) == $permission->id ? ' checked' : '' }}
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
                            {{--Permission list--}}

                            <div class="row" id="pageListContainer">
                                <div class="col-md-12">
                                    <div class="table-full-width" id="permissionList">
                                        <table class="table table-checkbox">
                                            <tbody>

                                            @foreach($allPages as $page)

                                                <tr>
                                                    <td class="td-only-checkbox">
                                                        <label class="radio">
                                                            <span class="icons">
                                                                <span class="first-icon fa fa-circle-o"></span>
                                                                <span class="second-icon fa fa-dot-circle-o"></span>
                                                            </span>
                                                            <input type="radio"
                                                                   name="page_id"
                                                                   value="{{ $page->id }}"
                                                                   data-toggle="radio"
                                                                    {{ (old('page_id') ? old('page_id') : $menu->page_id) == $page->id ? ' checked' : '' }}
                                                            >
                                                        </label>
                                                    </td>
                                                    <td>
                                                        {{ $page->display_name }}
                                                        @if($page->description)
                                                            (
                                                            <span class="description">{{ $page->display_name }}</span>
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
                                                {!! btnToCreate('pages', 'New page') !!}
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            {{--Module list--}}
                            <div class="row" id="moduleListContainer">
                                <div class="col-md-12">
                                    <div class="table-full-width" id="permissionList">
                                        <table class="table table-checkbox">
                                            <tbody>

                                            @foreach($allModules as $module)

                                                <tr>
                                                    <td class="td-only-checkbox">
                                                        <label class="radio">
                                                            <span class="icons">
                                                                <span class="first-icon fa fa-circle-o"></span>
                                                                <span class="second-icon fa fa-dot-circle-o"></span>
                                                            </span>
                                                            <input type="radio"
                                                                   name="module_id"
                                                                   value="{{ $module->id }}"
                                                                   data-toggle="radio"
                                                                    {{ (old('module_id') ? old('module_id') : $menu->module_id) == $module->id ? ' checked' : '' }}
                                                            >
                                                        </label>
                                                    </td>
                                                    <td>
                                                        {{ $module->display_name }}
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
                                                {!! btnToCreate('modules', 'New page') !!}
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            {{--Module list--}}

                            {{--Url input--}}
                            <div class="row" id="urlInputContainer">
                                <div class="col-md-12">

                                    <div class="form-group">
                                        <input type="text"
                                               name="url"
                                               class="form-control text-lowercase"
                                               autofocus
                                               value="{{ (old('url') ? old('url') : $menu->url) }}"
                                        >

                                        {!! formError($errors->first('url')) !!}
                                    </div>

                                </div>
                            </div>
                            {{--Url input--}}

                        </div>
                    </div>

                </div>

            </div>

            {!! formEditFooter('menus') !!}

            {!! closeForm() !!}

        </div>
    </div>

@endsection

@section('script')

    <script>
        $(document).ready(function () {
            togglePermissionList();

            function togglePermissionList() {
                var site_name = $('input[name="menu_site_id"]:checked').data('name');

                $('input[name="link_menu_to"]:nth-child(1)').trigger('change');

                if(site_name == 'backend') {
                    $('#permissionListContainer').slideDown();
                    $('#selectMenuLink').slideUp();
                } else if(site_name == 'frontend') {
                    $('#permissionListContainer').slideUp();
                    $('#selectMenuLink').slideDown();
                } else {
                    $('#permissionListContainer').slideUp();
                    $('#selectMenuLink').slideUp();
                }
            }

            $('input[name="menu_site_id"]').change(function () {
                togglePermissionList();
                $('input[name="link_menu_to"]').attr('checked', false);
            });

            toggleLinkToMenu();
            function toggleLinkToMenu() {
                var value = $('input[name="link_menu_to"]:checked').val();

                var pagesContainer = $('#pageListContainer');
                var moduleContainer = $('#moduleListContainer');
                var urlContainer = $('#urlInputContainer');

                $('input[name="menu_site_id"]:nth-child(1)').trigger('change');

                if(value == 'page') {
                    pagesContainer.slideDown();
                    moduleContainer.slideUp();
                    urlContainer.slideUp();
                } else if(value == 'module') {
                    moduleContainer.slideDown();
                    pagesContainer.slideUp();
                    urlContainer.slideUp();
                } else if(value == 'url') {
                    urlContainer.slideDown();
                    moduleContainer.slideUp();
                    pagesContainer.slideUp()
                } else {
                    urlContainer.slideUp();
                    moduleContainer.slideUp();
                    pagesContainer.slideUp();

                    urlContainer.find('input[type="radio"]').attr('checked', false);
                    moduleContainer.find('input[type="radio"]').attr('checked', false);
                    pagesContainer.find('input[type="radio"]').attr('checked', false);
                }
            }

            $('input[name="link_menu_to"]').change(function () {
                $('input[name="permission_id"]').attr('checked', false);
                toggleLinkToMenu();
            });
        });
    </script>

@endsection