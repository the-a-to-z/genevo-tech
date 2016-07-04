<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

class Menu extends Authenticatable
{

    protected $table = 'menus';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'slug', 'css_icon_class', 'menu_position_id', 'menu_site_id', 'permission_id', 'active'
    ];

    public function permission()
    {
        return $this->belongsTo('App\Permission');
    }

    public function findByRole($role)
    {
        return
            DB::table('menus')
                ->select(
                    'menus.id',
                    'menus.name',
                    'menus.slug',
                    'menus.description',
                    'menus.css_icon_class',
                    'menu_site.name as site',
                    'permission.name as permission_name',
                    'permission.display_name as permission_display_name',
                    'menu_position.name as position'
                )
                ->join('menu_site', 'menu_site.id', '=', 'menus.menu_site_id')
                ->join('menu_position', 'menu_position.id', '=', 'menus.menu_position_id')
                ->leftJoin('permission', 'permission.id', '=', 'menus.permission_id')
                ->leftJoin('role_permission', function ($join) use ($role) {
                    $join->on('role_permission.permission_id', '=', 'permission.id');
                    $join->on('role_permission.role_id', '=', DB::raw($role));
                })
                ->get();

    }

    public function menuPosition()
    {
        return $this->belongsTo('App\MenuPosition');
    }

    public function menuSite()
    {
        return $this->belongsTo('App\MenuSite');
    }

    public function page()
    {
        return $this->belongsTo('App\Page');
    }

}
