<?php

namespace App\Http\Controllers\Backend\Modules\Widgets;

use App\Http\Controllers\Backend\BackendController;
use App\Module;
use App\Modules\Widgets\ContactForm;
use App\Role;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;

class ContactFormController extends BackendController
{

    /**
     * Display a listing of the modules.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($moduleId)
    {
        return redirect(backendUrl(config('module.widget.contact-form.url') . '/' . $moduleId . '/show'));
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
        $this->registerPermissionAs('edit-module');

        $this->validate($request, [
            'title' => 'required'
        ]);

        $module = new ContactForm();

        $input = $request->all();

        $module->fill([
            'title' => $input['title'],
            'module_id' => $input['module_id'],
            'response_message' => $input['response_message'],
            'css_class' => (isset($input['css_class']) ? $input['css_class'] : null),
            'show_title' => $input['show_title'],
        ])->save();

        Session::flash('flash_message', 'Module has been saved!');

        return redirect()->back();
    }

    /**
     * Display the specified user.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->registerPermissionAs('edit-module');

        $widget = new ContactForm();

        return view(backendModuleViewUrl('widgets.contact-form.index'))->with([
            'modules' => Module::all(),
            'data' => $widget->findByModuleId($id),
            'module' => Module::find($id)
        ]);
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

        $module = ContactForm::findOrFail($id);

        $this->validate($request, [
            'title' => 'required',
            'response_message' => 'required',
        ]);

        $input = $request->all();

        $module->fill([
            'title' => $input['title'],
            'module_id' => $input['module_id'],
            'response_message' => $input['response_message'],
            'css_class' => (isset($input['css_class']) ? $input['css_class'] : null),
            'show_title' => $input['show_title'],
        ])->save();

        Session::flash('flash_message', 'Module has been saved!');

        return redirect()->back();
    }

    /**
     * Remove the specified user from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return redirect()->back();
    }
}
