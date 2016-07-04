<?php

namespace App\Http\Controllers\Backend;

use App\Menu;
use App\MenuPosition;
use App\MenuSite;
use App\Module;
use App\Page;
use App\PageModule;
use App\Permission;
use App\Role;
use App\RolePermission;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class ModulesController extends BackendController
{

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Display a listing of the modules.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->registerPermissionAs('view-modules');

        return view('backend.modules.index')->with([
            'modules' => Module::all()
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

        return view('backend.modules.create')->with([
            'allPermissions' => Permission::all(),
            'allMenuSites' => MenuSite::all(),
            'allMenuPositions' => MenuPosition::all(),
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
            'slug' => 'required|unique:modules',
            'name' => 'required',
            'menu_position_id' => 'required',
            'menu_site_id' => 'required',
        ]);

        $input = $request->all();

        $menu = new Menu();

        $menu->fill([
            'slug' => strtolower($input['slug']),
            'name' => ucfirst($input['name']),
            'description' => $input['description'],
            'css_icon_class' => $input['css_icon_class'],
            'menu_position_id' => $input['menu_position_id'],
            'menu_site_id' => $input['menu_site_id'],
            'permission_id' => $input['permission_id'],
        ])->save();

        $menuSite = MenuSite::find($input['menu_site_id']);

        if($menuSite->name == 'backend') {
            //always add new permission for root
            $permission = new RolePermission();
            $permission->addPermissionForRoot($input['permission_id']);
        }

        Session::flash('flash_message', 'Menu has been created!');

        return redirect(backendUrl('modules'));
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
        $this->registerPermissionAs('edit-page');

        $module = new Module();
        
        return view('backend.modules.edit')->with([
            'page' => Page::find($id),
            'notPageModules' => $module->findByNotPageId($id),
            'pageModules' => $module->findByPageId($id)
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
        $this->registerPermissionAs('edit-page');

        $page = Page::findOrFail($id);

        $this->validate($request, [
            'name' => 'required'
        ]);

        $input = $request->all();

        $page->fill([
            'name' => ucfirst($input['name']),
            'description' => $input['description'],
        ])->save();

        PageModule::where('page_id', $id)->delete();

        if(isset($input['module_id'])) {
            $pageModuleData = [];
            foreach ($input['module_id'] as $moduleId) {
                $pageModuleData[] = [
                    'page_id' => $id,
                    'module_id' => $moduleId
                ];
            }

            if(count($pageModuleData)) {
                $pageModule = new PageModule();
                $pageModule->insert($pageModuleData);
            }
        }

        Session::flash('flash_message', 'Page ' . ucfirst($input['name']) . ' has been saved!');

        return redirect()->back();
    }

    /**
     * Remove the specified menu from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->registerPermissionAs('delete-permission');

        $permission = Permission::findOrFail($id);
        $permission->delete();

        Session::flash('flash_message_type', 'warning');
        Session::flash('flash_message', 'Permission has been deleted!');

        return redirect()->back();
    }
}
