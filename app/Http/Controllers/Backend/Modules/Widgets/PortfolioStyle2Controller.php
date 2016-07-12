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
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
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

        return view(backendModuleViewUrl('widgets.portfolio-style-2.index'))->with([
            'modules' => Module::all(),
            'widget' => $widget->findByModuleId($id),
            'items' => $widgetItem->findByModuleId($id),
            'module' => Module::find($id)
        ]);
    }

    public function showCategory($moduleId)
    {
        $this->registerPermissionAs('edit-module');

        $widget = new PortfolioStyle2();

        return view(backendModuleViewUrl('widgets.portfolio-style-2.category'))->with([
            'widget' => $widget->findByModuleId($moduleId),
            'module' => Module::find($moduleId),
            'categories' => PortfolioStyle2Category::all()
        ]);
    }

    public function createItem($moduleId)
    {
        $this->registerPermissionAs('edit-module');

        $widget = new PortfolioStyle2();

        return view(backendModuleViewUrl('widgets.portfolio-style-2.create-item'))->with([
            'categories' => PortfolioStyle2Category::all(),
            'module' => Module::find($moduleId),
            'widget' => $widget->findByModuleId($moduleId),
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

        $module =  PortfolioStyle2::find($id                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        );

        $input = $request->all();

        $module->fill([
            'title' => $input['title'],
            'module_id' => $input['module_id'],
            'css_class' => (isset($input['css_class']) ? $input['css_class'] : null),
        ])->save();

        Session::flash('flash_message', 'Module has been saved!');

        return redirect()->back();
    }

    public function resetItemCategories($id, $categories)
    {
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

        $portfolioItem = new PortfolioStyle2Item();
        $portfolioItem->fill([
            'widget_id' => Input::get('widget_id'),
            'title' => Input::get('title'),
            'description' => Input::get('description'),
            'image' => $upload,
        ])->save();

        $this->resetItemCategories($portfolioItem->id, Input::get('category_id'));

        return redirect(backendUrl('portfolio-style-2/module/' . $moduleId ));
    }

    public function updateItem(Request $request)
    {
        $portfolioItem = PortfolioStyle2Item::find(Input::get('id'));

        if(Input::file('photo')) {
            $upload = $this->upload();

            if($upload == false) {
                Session::flash('flash_message', 'Image could not be saved. Please try again!');
                Session::flash('flash_message_type', 'danger');

                return redirect()->back();
            }

            $portfolioItem->fill([
                'widget_id' => Input::get('widget_id'),
                'title' => Input::get('title'),
                'description' => Input::get('description'),
                'image' => $upload,
            ])->save();
        } else {
            $portfolioItem->fill([
                'module_widget_portfolio_2_id' => Input::get('module_widget_portfolio_2_id'),
                'title' => Input::get('title'),
                'description' => Input::get('description')
            ])->save();
        }

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

        $upload = Image::make($file->getRealPath())->resize(318, 240)->save($path);

        if($upload == false) {
            return response()->json(['error' => $validator->errors()->getMessages()], 400);
        }

        return $filename;
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

    public function deleteItem($id)
    {
        $this->registerPermissionAs('edit-module');

        PortfolioStyle2Item::find($id)->delete();

        return redirect()->back();
    }
}
