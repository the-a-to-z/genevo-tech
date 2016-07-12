<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

class Module extends Authenticatable
{

    protected $table = 'modules';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'display_name', 'widget_name'
    ];

    public function pageModule()
    {
        return $this->hasMany('App\PageModule');
    }

    public function menu()
    {
        return $this->hasMany('App\Menu');
    }

    public function findByNotPageId($id)
    {
        return
            DB::table('modules')
                ->leftJoin('page_modules', function ($join) use($id) {
                    $join->on('page_modules.module_id', '=', 'modules.id');
                    $join->on('page_modules.page_id', '=', DB::raw($id));
                })
                ->whereNull('page_modules.module_id')
                ->get();
    }

    public function findByPageId($id)
    {
        return
            DB::table('modules')
                ->join('page_modules', function ($join) use($id) {
                    $join->on('page_modules.module_id', '=', 'modules.id');
                    $join->on('page_modules.page_id', '=', DB::raw($id));
                })
                ->get();
    }

}
