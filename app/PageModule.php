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

            $modulesData[$module->name]['widget'] = $class::where('module_id', $module->id)->first();
            $modulesData[$module->name]['module'] = $module;
        }

        return $modulesData;
    }

    public function findDetailOfModule($module, $itemSlug)
    {
        $class = config('module.widget.' . $module->widget_name . '.model');
        $obj = new $class();

        return $obj->findDetail($module->id, $itemSlug);
    }

    public function findModule($module)
    {
        $class = config('module.widget.' . $module->widget_name . '.model');

        return $class::where('module_id', $module->id)->first();
    }

}
