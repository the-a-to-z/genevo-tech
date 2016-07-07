<?php

namespace App\Http\Controllers\Backend;

use App\Permission;
use App\Role;
use App\RolePermission;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class PermissionsController extends BackendController
{

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Display a listing of the roles.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->registerPermissionAs('view-permissions');

        return view('backend.permissions.index')->with([
            'allPermissions' => Permission::all()
        ]);
    }

    /**
     * Show the form for creating a new role.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //set permission for this function
        $this->registerPermissionAs('create-permission');

        return view('backend.permissions.create');
    }

    /**
     * Store a newly created role in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->registerPermissionAs('create-permission');

        $this->validate($request, [
            'name' => 'required|unique:permission',
            'display_name' => 'required'
        ]);

        $input = $request->all();

        $permission = new Permission();

        $permission->fill([
            'name' => $input['name'],
            'display_name' => ucfirst($input['display_name']),
            'description' => $input['description']
        ])->save();

        $permission_inserted_id = $permission->id;

        //always add new permission for root
        $permission = new RolePermission();
        $permission->replacePermissionForRoot($permission_inserted_id);

        Session::flash('flash_message', 'Permission has been created!');

        return redirect(config('constants.backend-url') . 'permissions');
    }

    /**
     * Display the specified role.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified role.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->registerPermissionAs('edit-role');

        $permission = Permission::find($id);

        return view('backend.permissions.edit')->with('permission', $permission);
    }

    /**
     * Update the specified role in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->registerPermissionAs('edit-permission');

        $permission = Permission::findOrFail($id);

        $this->validate($request, [
            'name' => 'required|unique:permission,name,'. $id,
            'display_name' => 'required'
        ]);

        $input = $request->all();

        $permission->fill([
            'name' => $input['name'],
            'display_name' => ucfirst($input['display_name']),
            'description' => $input['description'],
        ])->save();

        Session::flash('flash_message', 'Permission has been saved!');

        return redirect()->back();
    }

    /**
     * Remove the specified role from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->registerPermissionAs('delete-permission');

        $permission = Permission::findOrFail($id);
        $permission->delete();

        $permission = RolePermission::where('permission_id', $id);
        $permission->delete();

        Session::flash('flash_message_type', 'warning');
        Session::flash('flash_message', 'Permission has been deleted!');

        return redirect()->back();
    }
}
