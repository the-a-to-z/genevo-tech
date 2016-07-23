<?php

namespace App\Http\Controllers\Backend\Modules\Widgets;

use App\Http\Controllers\Backend\BackendController;
use App\Module;
use App\Modules\Widgets\JobListing\JobListing;
use App\Modules\Widgets\JobListing\JobListingCategory;
use App\Modules\Widgets\JobListing\JobListingItem;
use App\Modules\Widgets\JobListing\JobListingItemCategory;
use App\Role;
use App\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class JobListingController extends BackendController
{

    /**
     * Display a listing of the modules.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($moduleId)
    {
        return redirect(backendUrl(config('module.widget.job-listing.url') . '/' . $moduleId . '/show'));
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

        $module = new JobListing();

        $module->fill([
            'title' => $request->title,
            'module_id' => $request->module_id,
            'css_class' => ($request->css_class && $request->css_class > 0 ? $request->css_class : null),
            'show_category_filter' => ($request->show_category_filter ? $request->show_category_filter : null),
            'theme' => ($request->theme ? $request->theme : null),
            'display_per_page' => ($request->display_per_page ? $request->display_per_page : null)
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

        $widget = new JobListing();
        $widgetItem = new JobListingItem();

        $module = Module::find($moduleId);
        $widget = $widget->findByModuleId($moduleId);

        return view(backendModuleViewUrl('widgets.job-listing.index'))->with([
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
        $widget = new JobListing();
        $widget = $widget->findByModuleId($moduleId);

        return view(backendModuleViewUrl('widgets.job-listing.create-item'))->with([
            'categories' => JobListingCategory ::where('widget_id', $widget->id)->get(),
            'module' => $module,
            'widget' => $widget,
            'breadcrumbs' => [
                'Modules List' => 'modules',
                $module->display_name => ('job-listing/module/' . $moduleId)
            ]
        ]);
    }

    public function editItem($moduleId, $id)
    {
        $this->registerPermissionAs('edit-module');

        $module = Module::find($moduleId);
        $widget = new JobListing();
        $widget = $widget->findByModuleId($moduleId);

        $category = new JobListingItemCategory();
        $categories = $category->ofItemWithAllCategories($id);

        return view(backendModuleViewUrl('widgets.job-listing.edit-item'))->with([
            'categories' => $categories,
            'module' => $module,
            'widget' => $widget,
            'item' => JobListingItem::find($id),
            'breadcrumbs' => [
                'Modules List' => 'modules',
                $module->display_name => ('job-listing/module/' . $moduleId)
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

        $module =  JobListing::find($id);

        $module->fill([
            'title' => $request->title,
            'module_id' => $request->module_id,
            'css_class' => ($request->css_class && $request->css_class > 0 ? $request->css_class : null),
            'show_category_filter' => ($request->show_category_filter ? $request->show_category_filter : null),
            'theme' => ($request->theme ? $request->theme : null),
            'display_per_page' => ($request->display_per_page ? $request->display_per_page : null)
        ])->save();

        Session::flash('flash_message', 'Module has been saved!');

        return redirect()->back();
    }

    public function resetItemCategories($id, $categories)
    {
        $this->registerPermissionAs('edit-module');

        JobListingItemCategory::where('item_id', $id)->delete();

        $dataInsert = [];
        foreach ($categories as $category) {
            $dataInsert[] = [
                'item_id' => $id,
                'category_id' => $category
            ];
        }

        return JobListingItemCategory::insert($dataInsert);
    }

    public function storeItem(Request $request, $moduleId)
    {
        $this->registerPermissionAs('edit-module');

        $this->validate($request, [
            'job_title' => 'required',
            'description' => 'required',
            'company' => 'required',
            'close_on' => 'required',
            'category_id' => 'required',
        ]);

        $item = new JobListingItem();

        $item->fill([
            'widget_id' => $request->widget_id,
            'slug' => str_slug($request->job_title),
            'job_title' => $request->job_title,
            'company' => $request->company,
            'close_on' => $request->close_on,
            'description' => $request->description
        ])->save();

        $this->resetItemCategories($item->id, $request->category_id);

        return redirect(backendUrl('job-listing/module/' . $moduleId ));
    }

    public function updateItem(Request $request, $moduleId, $id)
    {
        $this->registerPermissionAs('edit-module');

        $this->validate($request, [
            'job_title' => 'required',
            'description' => 'required',
            'company' => 'required',
            'close_on' => 'required',
            'category_id' => 'required',
        ]);

        $item = JobListingItem::find($request->id);

        $item->fill([
            'widget_id' => $request->widget_id,
            'slug' => str_slug($request->job_title),
            'job_title' => $request->job_title,
            'company' => $request->company,
            'close_on' => $request->close_on,
            'description' => $request->description
        ])->save();

        $this->resetItemCategories($item->id, $request->category_id);

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

        JobListingItem::find($id)->delete();

        Session::flash('flash_message_type', 'warning');
        Session::flash('flash_message', 'Item has been deleted!');

        return redirect()->back();
    }

    public function showCategory($moduleId)
    {
        $this->registerPermissionAs('edit-module');

        $module = Module::find($moduleId);
        $widget = new JobListing();
        $widget = $widget->findByModuleId($moduleId);
        $category = new JobListingCategory();

        return view(backendModuleViewUrl('widgets.job-listing.category'))->with([
            'widget' => $widget,
            'module' => $module,
            'categories' => $category->findByModuleId($moduleId),
            'breadcrumbs' => [
                'Modules List' => 'modules',
                $module->display_name => ('job-listing/module/' . $moduleId)
            ]
        ]);
    }

    public function storeCategory(Request $request, $moduleId)
    {
        $this->registerPermissionAs('edit-module');

        $this->validate($request, [
            'widget_id' => 'required',
            'name' => 'unique:module_widget_job_listing_categories',
            'display_name' => 'required',
        ]);

        $category = new JobListingCategory();

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
            'name' => 'unique:module_widget_job_listing_categories',
            'display_name' => 'required'
        ]);

        $category = JobListingCategory::find($id);

        $category->fill([
            'name' => str_slug($request->display_name),
            'display_name' => $request->display_name
        ])->save();

        return redirect()->back();
    }

    public function deleteCategory($moduleId, $id)
    {
        $this->registerPermissionAs('edit-module');

        if(JobListingItemCategory::where('category_id', $id)->count() > 0) {
            Session::flash('flash_message_type', 'danger');
            Session::flash(
                'flash_message',
                '<strong>Error! This category is being used by some item</strong>. Please remove this category from item then try again.'
            );

            return redirect()->back();
        }

        JobListingCategory::find($id)->delete();

        Session::flash('flash_message_type', 'warning');
        Session::flash('flash_message', 'Category has been deleted!');

        return redirect()->back();
    }
}
