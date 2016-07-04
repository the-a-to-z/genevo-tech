<?php

namespace App\Http\Controllers;


use App\Page;
use App\PageModule;
use Illuminate\Routing\Controller as BaseController;
use App\Http\Requests;
use App\Menu;
use App\Module;
use Illuminate\Http\Request;

class PageController extends BaseController
{

    protected $page;

    public function __construct()
    {

    }

    public function findModules()
    {
        $page = Page::where('name', $this->page)->first();

        if(count($page) == 0) {
            redirect('404');
        }

        $pageModule = new PageModule();

        return $pageModule->findPageModules($page->id);
    }

    public function redirectToConstruction()
    {
        return redirect('page-under-construction');
    }
}
