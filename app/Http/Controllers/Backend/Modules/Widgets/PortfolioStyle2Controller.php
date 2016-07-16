<?php

namespace App\Http\Controllers\Backend\Modules\Widgets;

use App\Http\Controllers\Backend\BackendController;
use App\Module;
use App\Modules\Widgets\PortfolioStyle2\PortfolioStyle2;
use App\Modules\Widgets\PortfolioStyle2\PortfolioStyle2Category;
use App\Modules\Widgets\PortfolioStyle2\PortfolioStyle2Item;
use App\Modules\Widgets\PortfolioStyle2\PortfolioStyle2ItemCategories;
use App\Role;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class PortfolioStyle2Controller extends BackendController
{

    /**
     * Display a listing of the modules.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($moduleId)
    {
        return redirect(backendUrl(config('module.widget.portfolio-style-2.url') . '/' . $moduleId . '/show'));
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

        $module = new PortfolioStyle2();

        $input = $request->all();

        $module->fill([
            'title' => $input['title'],
            'module_id' => $input['module_id'],
            'css_class' => (isset($input['css_class']) ? $input['css_class'] : null),
            'show_category_filter' => (isset($input['show_category_filter']) ? $input['show_category_filter'] : null),
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

        $widget = new PortfolioStyle2();
        $widgetItem = new PortfolioStyle2Item();

        $module = Module::find($id);
        $widget = $widget->findByModuleId($id);

        return view(backendModuleViewUrl('widgets.portfolio-style-2.index'))->with([
            'modules' => Module::all(),
            'widget' => $widget,
            'items' => $widgetItem->findByModuleId($id),
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
        $widget = new PortfolioStyle2();
        $widget = $widget->findByModuleId($moduleId);

        return view(backendModuleViewUrl('widgets.portfolio-style-2.create-item'))->with([
            'categories' => PortfolioStyle2Category ::where('widget_id', $widget->id)->get(),
            'module' => $module,
            'widget' => $widget,
            'breadcrumbs' => [
                'Modules List' => 'modules',
                $module->display_name => ('portfolio-style-2/module/' . $moduleId)
            ]
        ]);
    }

    public function editItem($moduleId, $id)
    {
        $this->registerPermissionAs('edit-module');

        $module = Module::find($moduleId);
        $widget = new PortfolioStyle2();
        $widget = $widget->findByModuleId($moduleId);
        $category = new PortfolioStyle2ItemCategories();
        $categories = $category->ofItemWithAllCategories($id);

        return view(backendModuleViewUrl('widgets.portfolio-style-2.edit-item'))->with([
            'categories' => $categories,
            'module' => $module,
            'widget' => $widget,
            'item' => PortfolioStyle2Item::find($id),
            'breadcrumbs' => [
                'Modules List' => 'modules',
                $module->display_name => ('portfolio-style-2/module/' . $moduleId)
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

        $module =  PortfolioStyle2::find($id);

        $module->fill([
            'title' => $request->title,
            'module_id' => $request->module_id,
            'css_class' => $request->css_class,
            'show_category_filter' => $request->show_category_filter,
        ])->save();

        Session::flash('flash_message', 'Module has been saved!');

        return redirect()->back();
    }

    public function resetItemCategories($id, $categories)
    {
        $this->registerPermissionAs('edit-module');

        PortfolioStyle2ItemCategories::where('item_id', $id)->delete();

        $dataInsert = [];
        foreach ($categories as $category) {
            $dataInsert[] = [
                'item_id' => $id,
                'category_id' => $category
            ];
        }

        PortfolioStyle2ItemCategories::insert($dataInsert);
    }

    public function storeItem(Request $request, $moduleId)
    {
        $this->registerPermissionAs('edit-module');

        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'category_id' => 'required',
        ]);

        $upload = $this->upload();

        if($upload == false) {
            Session::flash('flash_message', 'Image could not be saved. Please try again!');
            Session::flash('flash_message_type', 'danger');

            return redirect()->back();
        }

        $item = new PortfolioStyle2Item();
        $item->fill([
            'widget_id' => $request->widget_id,
            'slug' => str_slug($request->title),
            'title' => $request->title,
            'description' => $request->description,
            'image' => $upload,
        ])->save();

        $this->resetItemCategories($item->id, $request->category_id);

        return redirect(backendUrl('portfolio-style-2/module/' . $moduleId ));
    }

    public function updateItem(Request $request, $moduleId, $id)
    {
        $this->registerPermissionAs('edit-module');

        $item = PortfolioStyle2Item::find($request->id);

        if(Input::file('photo')) {
            $this->destroyFile($item->image);

            $upload = $this->upload();

            if($upload == false) {
                Session::flash('flash_message', 'Image could not be saved. Please try again!');
                Session::flash('flash_message_type', 'danger');

                return redirect()->back();
            }

            $item->fill([
                'widget_id' => $request->widget_id,
                'slug' => str_slug($request->title),
                'title' => $request->title,
                'description' => $request->description,
                'image' => $upload,
            ])->save();
        } else {
            $item->fill([
                'widget_id' => $request->widget_id,
                'slug' => str_slug($request->title),
                'title' => $request->title,
                'description' => $request->description
            ])->save();
        }

        $this->resetItemCategories($item->id, $request->category_id);

        Session::flash('flash_message', 'Item has been saved!');

        return redirect()->back();
    }

    /**
     * @return upload error in json format or name of the file uploaded
     */
    public function upload()
    {
        $file = Input::file('photo');

        // Build the input for validation
        $fileArray = array('photo' => $file);

        // Now pass the input and rules into the validator
        $validator = Validator::make($fileArray, [
            'photo' => 'mimes:jpeg,jpg,png,gif|required|max:20000'
        ]);

        // Check to see if validation fails or passes
        if ($validator->fails())
        {
            // that the provided file was not an adequate type
            dd(response()->json(['error' => $validator->errors()->getMessages()], 400));

            return false;
        }

        $filename  = time() . '.' . $file->getClientOriginalExtension();
        $path = public_path(uploadPath('portfolio-style-2/' . $filename));

        //big size 750 x 471 or 900 x 565
        Image::make($file->getRealPath())->resize(750, 471)->save($path);

        //thumb size 350 x 220
        $thumbPath = public_path(uploadPath('portfolio-style-2/thumbnails/' . $filename));
        $upload = Image::make($file->getRealPath())->resize(350, 220)->save($thumbPath );

        if($upload == false) {
            return response()->json(['error' => $validator->errors()->getMessages()], 400);
        }

        return $filename;
    }

    public function destroyFile($file)
    {
        File::delete(public_path(uploadPath('portfolio-style-2/' . $file)));
        File::delete(public_path(uploadPath('portfolio-style-2/thumbnails/' . $file)));

        return true;
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

        $item = PortfolioStyle2Item::find($id);

        $this->destroyFile($item->image);

        $item->delete();

        Session::flash('flash_message_type', 'warning');
        Session::flash('flash_message', 'Item has been deleted!');

        return redirect()->back();
    }

    public function showCategory($moduleId)
    {
        $this->registerPermissionAs('edit-module');

        $module = Module::find($moduleId);
        $widget = new PortfolioStyle2();
        $widget = $widget->findByModuleId($moduleId);
        $category = new PortfolioStyle2Category();

        return view(backendModuleViewUrl('widgets.portfolio-style-2.category'))->with([
            'widget' => $widget,
            'module' => $module,
            'categories' => $category->findByModuleId($moduleId),
            'breadcrumbs' => [
                'Modules List' => 'modules',
                $module->display_name => ('portfolio-style-2/module/' . $moduleId)
            ]
        ]);
    }

    public function storeCategory(Request $request, $moduleId)
    {
        $this->registerPermissionAs('edit-module');

        $this->validate($request, [
            'widget_id' => 'required',
            'display_name' => 'required'
        ]);

        $category = new PortfolioStyle2Category();

        $category->fill([
            'widget_id' => $request->widget_id,
            'name' => str_slug($request->display_name),
            'display_name' => $request->display_name
        ])->save();

        return redirect()->back();
    }

    public function updateCategory(Request $request, $moduleId, $id)
    {
        $this->registerPermissionAs('edit-module');

        $this->validate($request, [
            'display_name' => 'required'
        ]);

        $category = PortfolioStyle2Category::find($id);

        $category->fill([
            'name' => str_slug($request->display_name),
            'display_name' => $request->display_name
        ])->save();

        return redirect()->back();
    }

    public function deleteCategory($moduleId, $id)
    {
        $this->registerPermissionAs('edit-module');

        if(PortfolioStyle2ItemCategories::where('category_id', $id)->count() > 0) {
            Session::flash('flash_message_type', 'danger');
            Session::flash(
                'flash_message',
                '<strong>Error! This category is being used by some item</strong>. Please remove this category from item then try again.'
            );

            return redirect()->back();
        }

        PortfolioStyle2Category::find($id)->delete();

        Session::flash('flash_message_type', 'warning');
        Session::flash('flash_message', 'Category has been deleted!');

        return redirect()->back();
    }
}
