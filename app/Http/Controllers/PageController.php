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
                'currentPage' => $currentPage,
            ],
            'currentMenu' => $currentPage
        ]);
    }

    public function show($slug, $itemSlug, $itemId = null)
    {
        $currentPage = App\Page::where('name', $slug)->first();

        $pageModule = new PageModule();

        $module = App\Module::where('name', $slug)->first();

        $pageModule = $pageModule->findModule($module);

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
            'data' => $data,
            'currentMenu' => $currentPage
        ]);
    }

    public function showByCategory($slug, $categorySlug)
    {
        $currentPage = App\Page::where('name', $slug)->first();

        $pageModule = new PageModule();

        $module = App\Module::where('name', $slug)->first();

        $pageModule = $pageModule->findModule($module);

        if($pageModule == null) {
            redirect('404');
        }

        $category = $pageModule->categories()->where('name', $categorySlug)->first();

        $data = [
            'data' => [
                'pageModules' => [
                    $module->name => [
                        'widget' => $pageModule,
                        'module' => $module,
                        'category' => $category
                    ]
                ],
                'currentPage' => $currentPage,
                'currentMenu' => $currentPage,
            ]
        ];

        return view('page')->with($data);
    }

    public function redirectToConstruction()
    {
        return redirect('page-under-construction');
    }
}
