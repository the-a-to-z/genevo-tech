<?php

namespace App;

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

    public function module()
    {
        return $this->belongsTo('App\Module');
    }

    public function findPageModules($pageId)
    {
        $modules = DB::table('page_modules')
                     ->join('modules', 'modules.id', '=', 'page_modules.module_id')
                     ->where('page_id', $pageId)
                     ->get();

        $modulesData = [];

        foreach ($modules as $module) {
            $class = config('module.widget.' . $module->widget_name . '.model');
            $obj = new $class();

            $modulesData[$module->name]['data'] = $obj->viewData($module->id);
            $modulesData[$module->name]['widget'] = $module->widget_name;
        }

        return $modulesData;
    }

    public function findDetailOfModule($module, $itemSlug)
    {
        $class = config('module.widget.' . $module->widget_name . '.model');
        $obj = new $class();

        return $obj->findDetail($module->id, $itemSlug);
    }

}
