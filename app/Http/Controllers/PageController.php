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
        $currentMenu = $this->menu->findBySlug($slug);

        if($currentMenu == null) {
            redirect('404');
        }

        $pageModule = new PageModule();

        $pageModules = $pageModule->findPageModules($currentMenu->page_id);

        return view('page')->with([
            'data' => [
                'pageModules' => $pageModules,
                'currentMenu' => $currentMenu
            ]
        ]);
    }

    public function show($slug, $itemSlug)
    {
        $module = App\Module::where('name', $slug)->first();

        if($module == null) {
            redirect('404');
        }

        $pageModule = new PageModule();;

        $data = [
            'module' => [
                'data' => $module,
                'item' => $pageModule->findDetailOfModule($module, $itemSlug)
            ]
        ];

        $currentMenu = $this->menu->findBySlug($slug);

        if($currentMenu) {
            $data['currentMenu'] = $currentMenu;
        }

        return view('page')->with($data);
    }

    public function showByCategory($slug, $categorySlug)
    {
        $currentMenu = $this->menu->findBySlug($slug);

        if($currentMenu == null) {
            redirect('404');
        }

        $pageModule = new PageModule();

        $pageModules = $pageModule->findPageModules($currentMenu->page_id);

        $widget = (array_values($pageModules)[0])['widget'];

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
                'currentMenu' => $currentMenu
            ]
        ];

        return view('page')->with($data);
    }

    public function redirectToConstruction()
    {
        return redirect('page-under-construction');
    }
}
