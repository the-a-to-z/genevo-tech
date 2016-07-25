<?php

namespace App\Http\Controllers\Backend\Modules\Widgets;

use App\Http\Controllers\Backend\BackendController;
use App\Module;
use App\Modules\Widgets\PeopleProfile\PeopleProfile;
use App\Modules\Widgets\PeopleProfile\PeopleProfileItem;
use App\Role;
use App\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class PeopleProfileController extends BackendController
{

    /**
     * Display a listing of the modules.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($moduleId)
    {
        return redirect(backendUrl(config('module.widget.people-profile.url') . '/' . $moduleId . '/show'));
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

        $module = new PeopleProfile();

        $module->fill([
            'title' => $request->title,
            'module_id' => $request->module_id,
            'css_class' => ($request->css_class && $request->css_class > 0 ? $request->css_class : null),
            'description' => ($request->description ? $request->theme : null),
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
    public function show($moduleId)
    {
        $this->registerPermissionAs('edit-module');

        $widget = new PeopleProfile();
        $widgetItem = new PeopleProfileItem();

        $module = Module::find($moduleId);
        $widget = $widget->findByModuleId($moduleId);

        return view(backendModuleViewUrl('widgets.people-profile.index'))->with([
            //'modules' => Module::all(),
            'widget' => $widget,
            'items' => $widgetItem->findByModuleId($moduleId),
            'module' => $module,
            'breadcrumbs' => [
                'Modules List' => 'modules'
            ]
        ]);
    }

    public function createItem($moduleId)
    {
        $this->registerPermissionAs('edit-module');

        $module = Module::find($moduleId);
        $widget = new PeopleProfile();
        $widget = $widget->findByModuleId($moduleId);

        return view(backendModuleViewUrl('widgets.people-profile.create-item'))->with([
            'module' => $module,
            'widget' => $widget,
            'breadcrumbs' => [
                'Modules List' => 'modules',
                $module->display_name => ('people-profile/module/' . $moduleId)
            ]
        ]);
    }

    public function editItem($moduleId, $id)
    {
        $this->registerPermissionAs('edit-module');

        $module = Module::find($moduleId);
        $widget = new PeopleProfile();
        $widget = $widget->findByModuleId($moduleId);

        return view(backendModuleViewUrl('widgets.people-profile.edit-item'))->with([
            'module' => $module,
            'widget' => $widget,
            'item' => PeopleProfileItem::find($id),
            'breadcrumbs' => [
                'Modules List' => 'modules',
                $module->display_name => ('people-profile/module/' . $moduleId)
            ]
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

        $this->validate($request, [
            'title' => 'required'
        ]);

        $module =  PeopleProfile::find($id);

        $module->fill([
            'title' => $request->title,
            'module_id' => $request->module_id,
            'css_class' => ($request->css_class && $request->css_class > 0 ? $request->css_class : null),
            'description' => ($request->description ? $request->description : null),
        ])->save();

        Session::flash('flash_message', 'Module has been saved!');

        return redirect()->back();
    }

    public function upload()
    {
        $file = Input::file('profile_photo');

        // Build the input for validation
        $fileArray = array('profile_photo' => $file);

        // Now pass the input and rules into the validator
        $validator = Validator::make($fileArray, [
            'profile_photo' => 'mimes:jpeg,jpg,png,gif|required|max:10000'
        ]);

        // Check to see if validation fails or passes
        if ($validator->fails())
        {
            // that the provided file was not an adequate type
            return response()->json(['error' => $validator->errors()->getMessages()], 400);
        }

        $filename  = time() . '.' . $file->getClientOriginalExtension();
        $path = public_path('uploads/people-profile/' . $filename);

        $upload = Image::make($file->getRealPath())->resize(359, 473)->save($path);

        if($upload == false) {
            dd(response()->json(['error' => $validator->errors()->getMessages()], 400));
        }

        return $filename;
    }

    public function storeItem(Request $request, $moduleId)
    {
        $this->registerPermissionAs('edit-module');

        $upload = $this->upload();

        if($upload == false) {
            Session::flash('flash_message', 'Image could not be saved. Please try again!');
            Session::flash('flash_message_type', 'danger');

            return redirect()->back();
        }

        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'short_description' => 'required'
        ]);

        PeopleProfileItem::create([
            'widget_id' => $request->widget_id,
            'slug' => str_slug($request->name),
            'name' => $request->name,
            'profile_photo' => $upload,
            'short_description' => $request->short_description,
            'description' => $request->description,
            'facebook_link' => $request->facebook_link,
            'google_link' => $request->google_link,
            'twitter_link' => $request->twitter_link,
            'linkedin_link' => $request->linkedin_link,
        ]);

        return redirect(backendUrl('people-profile/module/' . $moduleId ));
    }

    public function updateItem(Request $request, $moduleId, $id)
    {
        $this->registerPermissionAs('edit-module');

        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'short_description' => 'required',
        ]);

        $item = PeopleProfileItem::find($request->id);

        if(Input::file('profile_photo')) {
            $this->destroyFile($item->profile_photo);

            $upload = $this->upload();

            if($upload == false) {
                Session::flash('flash_message', 'Image could not be saved. Please try again!');
                Session::flash('flash_message_type', 'danger');

                return redirect()->back();
            }

            $item->fill([
                'widget_id' => $request->widget_id,
                'slug' => str_slug($request->name),
                'name' => $request->name,
                'profile_photo' => $upload,
                'short_description' => $request->short_description,
                'description' => $request->description,
                'facebook_link' => $request->facebook_link,
                'google_link' => $request->google_link,
                'twitter_link' => $request->twitter_link,
                'linkedin_link' => $request->linkedin_link,
            ])->save();
        } else {
            $item->fill([
                'widget_id' => $request->widget_id,
                'slug' => str_slug($request->name),
                'name' => $request->name,
                'short_description' => $request->short_description,
                'description' => $request->description,
                'facebook_link' => $request->facebook_link,
                'google_link' => $request->google_link,
                'twitter_link' => $request->twitter_link,
                'linkedin_link' => $request->linkedin_link,
            ])->save();
        }

        Session::flash('flash_message', 'Item has been saved!');

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

    public function deleteItem($moduleId, $id)
    {
        $this->registerPermissionAs('edit-module');

        $item = PeopleProfileItem::find($id);

        $this->destroyFile($item->profile_photo);

        $item->delete();

        Session::flash('flash_message_type', 'warning');
        Session::flash('flash_message', 'Item has been deleted!');

        return redirect()->back();
    }

    public function destroyFile($filename)
    {
        return File::delete("uploads/people-profile/" . $filename);
    }

}
