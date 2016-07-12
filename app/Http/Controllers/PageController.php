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
            'menus' => $menu
        ]);
    }


    public function redirectToConstruction()
    {
        return redirect('page-under-construction');
    }
}
