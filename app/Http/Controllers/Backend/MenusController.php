<?php

namespace App\Http\Controllers\Backend;

use App\Menu;
use App\MenuPosition;
use App\MenuSite;
use App\Module;
use App\Page;
use App\Permission;
use App\Role;
use App\RolePermission;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class MenusController extends BackendController
{

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Display a listing of the menus.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->registerPermissionAs('view-menus');

        $menuSite = MenuSite::where('name', 'frontend')->first();
        $menu = $menuSite->menus();

        return view('backend.menus.index')->with([
            'frontendMenus' => $menu->orderBy('menu_position_id')->orderBy('default_order')->get()
        ]);
    }

    public function showBackendMenus()
    {
        $this->registerPermissionAs('view-menus');

        return view('backend.menus.index')->with([
            'allMenus' => Menu::with('menuPosition', 'menuSite', 'permission')->get()
        ]);
    }

    /**
     * Show the form for creating a new menu.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //set permission for this function
        $this->registerPermissionAs('create-menu');

        return view('backend.menus.create')->with([
            'allPermissions' => Permission::all(),
            'allMenuSites' => MenuSite::all(),
            'allMenuPositions' => MenuPosition::all(),
            'allModules' => Module::all(),
            'allPages' => Page::all(),
        ]);
    }

    /**
     * Store a newly created menu in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->registerPermissionAs('create-menu');

        $this->validate($request, [
            'slug' => 'unique:menus',
            'name' => 'required',
            'menu_position_id' => 'required',
            'menu_site_id' => 'required',
        ]);

        $input = $request->all();

        $pageId = null;
        $moduleId = null;
        $url = null;

        $menuSite = MenuSite::find($input['menu_site_id']);

        if($menuSite->name == 'frontend') {
            $this->validate($request, [
                'link_menu_to' => 'required',
            ]);

            if($input['link_menu_to'] == 'page') {
                $this->validate($request, [
                    'page_id' => 'required',
                ]);

                $pageId = $input['page_id'];
            } else if($input['link_menu_to'] == 'module') {
                $this->validate($request, [
                    'module_id' => 'required',
                ]);

                $moduleId = $input['module_id'];
            } else {
                $this->validate($request, [
                    'url' => 'required',
                ]);

                $url = $input['url'];
            }
        }

        $menu = new Menu();

        $menu->fill([
            'slug' => ($input['slug'] ? strtolower($input['slug']) : null),
            'name' => ucfirst($input['name']),
            'description' => $input['description'],
            'css_icon_class' => $input['css_icon_class'],
            'menu_position_id' => $input['menu_position_id'],
            'menu_site_id' => $input['menu_site_id'],
            'permission_id' => (isset($input['permission_id']) ? $input['permission_id'] : null),
            'page_id' => $pageId,
            'module_id' => $moduleId,
            'url' => $url,
        ])->save();

        $menuSite = MenuSite::find($input['menu_site_id']);

        if($menuSite->name == 'backend') {
            //always add new permission for root

            $permission = new RolePermission();
            $permission->replacePermissionForRoot($input['permission_id']);
        }

        Session::flash('flash_message', 'Menu has been created!');

        return redirect(backendUrl('menus'));
    }

    /**
     * Display the specified menu.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified menu.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->registerPermissionAs('edit-menu');

        $menu = Menu::find($id);

        return view('backend.menus.edit')->with([
            'menu' => $menu,
            'allPermissions' => Permission::all(),
            'allMenuSites' => MenuSite::all(),
            'allMenuPositions' => MenuPosition::all(),
            'allModules' => Module::all(),
            'allPages' => Page::all(),
        ]);
    }

    /**
     * Update the specified menu in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->registerPermissionAs('edit-menu');

        $this->validate($request, [
            'slug' => 'unique:menus,id,'.$id,
            'name' => 'required',
            'menu_position_id' => 'required',
            'menu_site_id' => 'required',
        ]);

        $input = $request->all();

        $pageId = null;
        $moduleId = null;
        $url = null;

        $menuSite = MenuSite::find($input['menu_site_id']);

        if($menuSite->name == 'frontend') {
            $this->validate($request, [
                'link_menu_to' => 'required',
            ]);

            if($input['link_menu_to'] == 'page') {
                $this->validate($request, [
                    'page_id' => 'required',
                ]);

                $pageId = $input['page_id'];
            } else if($input['link_menu_to'] == 'module') {
                $this->validate($request, [
                    'module_id' => 'required',
                ]);

                $moduleId = $input['module_id'];
            } else {
                $this->validate($request, [
                    'url' => 'required',
                ]);

                $url = $input['url'];
            }
        }

        $menu = Menu::find($id);

        $menu->update([
            'slug' => ($input['slug'] ? strtolower($input['slug']) : null),
            'name' => ucfirst($input['name']),
            'description' => $input['description'],
            'css_icon_class' => $input['css_icon_class'],
            'menu_position_id' => $input['menu_position_id'],
            'menu_site_id' => $input['menu_site_id'],
            'permission_id' => (isset($input['permission_id']) ? $input['permission_id'] : null),
            'page_id' => $pageId,
            'module_id' => $moduleId,
            'url' => $url,
        ]);

        if($menuSite->name == 'backend') {
            //always add new permission for root

            $this->validate($request, [
                'permission_id' => 'required',
            ]);

            $permission = new RolePermission();
            $permission->replacePermissionForRoot($input['permission_id']);
        }

        Session::flash('flash_message', 'Menu has been saved!');

        return redirect()->back();
    }

    public function updateOrder(Request $request)
    {
        Menu::find($request->menu_id)->fill([
            'default_order' => $request->default_order
        ])->save();

        return response()->json([
            'message' => 'Menu order has been saved!',
            'message_type' => 'info'
        ]);
    }

    /**
     * Remove the specified menu from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->registerPermissionAs('delete-menu');

        $menu = Menu::findOrFail($id);
        $menu->delete();

        Session::flash('flash_message_type', 'warning');
        Session::flash('flash_message', 'Menu has been deleted!');

        return redirect()->back();
    }
}
