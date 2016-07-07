<?php

namespace App\Http\Controllers\Backend\Modules;

use App\Http\Controllers\Backend\BackendController;
use App\Module;
use App\Modules\HomeSlideshow;
use App\Role;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class HomeSlideshowController extends BackendController
{

    /**
     * Display a listing of the modules.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->registerPermissionAs('edit-module');
        
        return view(backendModuleViewUrl('home-slideshow.index'))->with([
            'modules' => Module::all(),
            'data' => HomeSlideshow::all()
        ]);
    }

    /**
     * Show the form for creating a new user.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //set permission for this function
        $this->registerPermissionAs('create-user');

        return view('backend.modules.create')->with([
            'roles' => Role::get()
        ]);
    }

    /**
     * Store a newly created user in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->registerPermissionAs('create-user');

        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:modules',
            'role_id' => 'required',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6'
        ]);

        $user = new User();

        $user->fill($request->all())->save();

        Session::flash('flash_message', 'User has been saved!');

        return redirect(config('constants.backend-url') . 'modules');
    }

    /**
     * Display the specified user.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified user.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->registerPermissionAs('edit-user');

        return view('backend.modules.edit')->with([
            'user' => User::find($id),
            'roles' => Role::get()
        ]);
    }

    /**
     * Update the specified user in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->registerPermissionAs('edit-module');

        $module = AboutDescription::findOrFail($id);

        $this->validate($request, [
            'title' => 'required'
        ]);

        $input = $request->all();

        $module->fill($input)->save();

        Session::flash('flash_message', 'Module has been saved!');

        return redirect()->back();
    }

    /**
     * Remove the specified home-slideshow from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->registerPermissionAs('edit-module');

        $homeSlideshow = HomeSlideshow::find($id);

        $homeSlideshow->delete();

        Session::flash('flash_message_type', 'warning');
        Session::flash('flash_message', 'Image has been deleted!');

        return redirect()->back();
    }
}
