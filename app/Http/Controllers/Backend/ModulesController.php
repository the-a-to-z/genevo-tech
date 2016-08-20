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
use Yajra\Datatables\Facades\Datatables;

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
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function data()
    {
        return Datatables::of(Module::all())->make(true);
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

        return view('backend.modules.create');
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
            'name' => 'required|unique:modules',
            'display_name' => 'required'
        ]);

        $input = $request->all();

        $module = new Module();

        $module->fill([
            'name' => strtolower($input['name']),
            'widget_name' => strtolower($input['widget_name']),
            'display_name' => ucfirst($input['display_name']),
            'description' => $input['description']
        ])->save();

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
            'display_name' => ucfirst($input['display_name']),
            'widget_name' => strtolower($input['widget_name']),
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
        $this->registerPermissionAs('delete-module');

        $module = Module::findOrFail($id);
        $module->delete();

        PageModule::where('module_id', $id)->delete();

        Session::flash('flash_message_type', 'warning');
        Session::flash('flash_message', 'Module <strong>' . $module->display_name. '</strong> has been deleted!');

        return redirect()->back();
    }
}
