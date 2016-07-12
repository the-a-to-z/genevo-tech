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

class PagesController extends BackendController
{

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Display a listing of the pages.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->registerPermissionAs('view-pages');

        return view('backend.pages.index')->with([
            'allPages' => Page::all()
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
        $this->registerPermissionAs('create-page');

        $module = new Module();

        return view('backend.pages.create')->with([
            'modules' => Module::all()
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
        $this->registerPermissionAs('edit-page');

        $this->validate($request, [
            'name' => 'required',
            'display_name' => 'required'
        ]);

        $input = $request->all();

        $page = new Page();

        $page->fill([
            'name' => strtolower($input['name']),
            'display_name' => ucfirst($input['display_name']),
            'description' => $input['description'],
        ])->save();

        if(isset($input['module_id'])) {
            $pageModuleData = [];
            foreach ($input['module_id'] as $moduleId) {
                $pageModuleData[] = [
                    'page_id' => $page->id,
                    'module_id' => $moduleId
                ];
            }

            if(count($pageModuleData)) {
                $pageModule = new PageModule();
                $pageModule->insert($pageModuleData);
            }
        }

        Session::flash('flash_message', 'Page ' . ucfirst($input['name']) . ' has been created!');

        return redirect(backendUrl('pages'));
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
        
        return view('backend.pages.edit')->with([
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
            'name' => 'required',
            'display_name' => 'required',
        ]);

        $input = $request->all();

        $page->fill([
            'display_name' => ucfirst($input['display_name']),
            'description' => $input['description'],
        ])->save();

        if(isset($input['module_id'])) {
            //delete current page modules from database
           // PageModule::where('page_id', $id)->delete();

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

        $permission = Page::findOrFail($id);
        $permission->delete();

        PageModule::where('page_id', $id)->delete();

        Session::flash('flash_message_type', 'warning');
        Session::flash('flash_message', 'Page has been deleted!');

        return redirect()->back();
    }
}
