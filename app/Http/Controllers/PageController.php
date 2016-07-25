<?php

namespace App\Http\Controllers;

use App\Module;
use App\PageModule;
use App\Http\Requests;
use App\Menu;
use App;
use Illuminate\Support\Facades\View;

class PageController extends Controller
{

    protected $menu;

    public function __construct()
    {
        $this->menu = new Menu();

        $menu = $this->menu->findFrontend();

        View::share('menus', $menu);
        View::share('settings', App\Setting::all());
    }

    public function index($slug = null, $paginate = null)
    {
        $currentPage = App\Page::where('name', $slug)->first();

        if($currentPage == null) {
            redirect('404');
        }

        $pageModule = new PageModule();

        $pageModules = $pageModule->findPageModules($currentPage->id);

        return view('page')->with([
            'data' => [
                'pageModules' => $pageModules,
                'currentPage' => $currentPage
            ]
        ]);
    }

    public function show($slug, $itemSlug, $itemId = null)
    {
        $currentPage = App\Page::where('name', $slug)->first();
        $pageModule = new PageModule();

        if ($currentPage) {
            $pageModules = $pageModule->findPageModules($currentPage->id);

            $pageModuleFirst = (array_values($pageModules)[0]);

            $pageModule = $pageModuleFirst['widget'];

            $module = App\Module::find($pageModule->module_id);

            $data['data']['currentPage'] = $currentPage;
        } else {
            $module = App\Module::where('name', $slug)->first();

            $pageModule = $pageModule->findModule($module);
        }

        if($itemId) {
            $item = $pageModule->items()->find($itemId);
        } else {
            $item = $pageModule->items()->first();
        }

        $data['item'] = $item;
        $data['widget'] = $pageModule;
        $data['module'] = $module;
        $data['pageDetail'] = true;

        return view('page')->with([
            'data' => $data
        ]);
    }

    public function showByCategory($slug, $categorySlug)
    {
        $currentPage = App\Page::where('name', $slug)->first();

        if($currentPage == null) {
            redirect('404');
        }

        $pageModule = new PageModule();

        $pageModules = $pageModule->findPageModules($currentPage->id);

		$pageModuleFirst = (array_values($pageModules)[0]);

        $widget = $pageModuleFirst['widget'];

        $category = $widget->categories()->where('name', $categorySlug)->first();

        $module = Module::find($widget->module_id);

        $data = [
            'data' => [
                'pageModules' => [
                    $module->name => [
                        'widget' => $widget,
                        'module' => $module,
                        'category' => $category
                    ]
                ],
                'currentPage' => $currentPage
            ]
        ];

        return view('page')->with($data);
    }

    public function redirectToConstruction()
    {
        return redirect('page-under-construction');
    }
}
