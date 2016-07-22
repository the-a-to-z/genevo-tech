<?php

namespace App\Http\Controllers;

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
    }

    public function index($slug = null, $paginate = null)
    {
        $menu = new Menu();
        $currentMenu = $menu->findBySlug($slug);

        if($currentMenu == null) {
            redirect('404');
        }

        $pageModule = new PageModule();

        $pageModules = $pageModule->findPageModules($currentMenu->page_id);

        return view('page')->with([
            'pageModules' => $pageModules,
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

        $data = [
            'module' => [
                'data' => $module,
                'item' => $pageModule->findDetailOfModule($module, $itemSlug)
            ]
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
