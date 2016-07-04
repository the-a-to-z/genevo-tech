<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

class HomeController extends PageController
{

    protected $page = 'home';

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modules = $this->findModules();

        if(count($modules) == 0) {
            $this->redirectToConstruction();
        }

        return view('page')->with([
            'modules' => $modules
        ]);
    }
}
