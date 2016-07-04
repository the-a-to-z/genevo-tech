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

class RolesController extends BackendController
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
        $this->registerPermissionAs('view-roles');

        $roles = Role::all();

        return view('backend.roles.index')->with([
            'roles' => $roles
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
        $this->registerPermissionAs('create-role');

        $rolePermission = new RolePermission();

        $rolePermission = $rolePermission->allPermissions();

        return view('backend.roles.create')->with([
            'roles' => Role::get(),
            'rolePermissions' => $rolePermission
        ]);
    }

    /**
     * Store a newly created role in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->registerPermissionAs('create-role');

        $this->validate($request, [
            'name' => 'required|unique:roles',
            'display_name' => 'required'
        ]);

        $input = $request->all();

        $role = new Role();

        $role->fill([
            'name' => $input['name'],
            'display_name' => $input['display_name'],
            'description' => $input['description']
        ])->save();

        $rolePermission = new RolePermission();
        $rolePermission->replace($role->id, $input);

        Session::flash('flash_message', 'Role has been saved!');

        return redirect(config('constants.backend-url') . 'roles');
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

        $role = Role::find($id);

        $this->runFailCheckActionOnHimself('edit-his-own-permission', $this->loggedInUser->role_id, $role->id);

        $rolePermission = new RolePermission();

        $rolePermission = $rolePermission->allPermissionsWithRole($id);

        return view('backend.roles.edit')->with([
            'role' => $role,
            'rolePermissions' => $rolePermission
        ]);
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
        $this->registerPermissionAs('edit-role');

        $role = Role::findOrFail($id);

        $this->validate($request, [
            'name' => 'required|unique:roles,name,'. $id,
            'display_name' => 'required'
        ]);

        $input = $request->all();

        $role->fill([
            'name' => $input['name'],
            'display_name' => $input['display_name'],
            'description' => $input['description'],
        ])->save();

        $rolePermission = new RolePermission();
        $rolePermission->replace($id, $input);

        Session::flash('flash_message', 'Role has been saved!');

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
        $this->registerPermissionAs('delete-role');
    }
}
