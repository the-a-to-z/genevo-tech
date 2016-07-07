<?php

namespace App;

use App\Modules\AboutDescription;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

class PageModule extends Authenticatable
{

    protected $table = 'page_modules';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'page_id', 'module_id'
    ];

    protected $modulesMapping = [
        'about-description' => 'App\Modules\AboutDescription',
        'home-slideshow' => 'App\Modules\HomeSlideshow'
    ];

    public function module()
    {
        return $this->belongsTo('App\Module');
    }

    public function moduleMap($key)
    {
        return $this->modulesMapping[$key];
    }

    public function findPageModules($pageId)
    {
        $modules = DB::table('page_modules')
                     ->join('modules', 'modules.id', '=', 'page_modules.module_id')
                     ->get();


        $modulesData = [];

        foreach ($modules as $module) {
            $class = $this->moduleMap($module->name);
            $obj = new $class();

            $modulesData[$module->name] = $obj->viewData();
        }

        return $modulesData;
    }

}
