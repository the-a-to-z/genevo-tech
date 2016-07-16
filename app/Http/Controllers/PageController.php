<?php

namespace App\Http\Controllers;

use App\PageModule;
use App\Http\Requests;
use App\Menu;
use App;

class PageController extends Controller
{

    public function index($slug = null)
    {
        $menu = new Menu();
        $currentMenu = $menu->findBySlug($slug);

        if($currentMenu == null) {
            redirect('404');
        }

        $pageModule = new PageModule();

        $pageModules = $pageModule->findPageModules($currentMenu->page_id);

        $menu = $menu->findFrontend();

        return view('page')->with([
            'pageModules' => $pageModules,
            'menus' => $menu,
            'currentMenu' => $currentMenu
        ]);
    }

    public function show($slug, $itemSlug)
    {
        $module = App\Module::where('name', $slug)->first();

        if($module == null) {
            redirect('404');
        }

        $pageModule = new PageModule();

        $menu = new Menu();
        $menus = $menu->findFrontend();

        $data = [
            'module' => [
                'data' => $module,
                'item' => $pageModule->findDetailOfModule($module, $itemSlug)
            ],
            'menus' => $menus
        ];

        $currentMenu = $menu->findBySlug($slug);

        if($currentMenu) {
            $data['currentMenu'] = $currentMenu;
        }

        return view('page')->with($data);
    }

    public function redirectToConstruction()
    {
        return redirect('page-under-construction');
    }
}
