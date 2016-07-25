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
        'page_id', 'url', 'module_id', 'name', 'description', 'slug', 'css_icon_class',
        'menu_position_id', 'menu_site_id', 'permission_id', 'active', 'default_order'
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
                ->orderBy('default_order', 'menu.id')
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

    public function module()
    {
        return $this->belongsTo('App\Module');
    }

    public function findFrontend()
    {
        return
            DB::table('menus')
                ->select(
                    'menus.*',
                    'pages.name as page_name',
                    'modules.name as module_name'
                )
                ->join('menu_site', 'menu_site.id', '=', 'menus.menu_site_id')
                ->join('menu_position', 'menu_position.id', '=', 'menus.menu_position_id')
                ->leftJoin('pages', 'pages.id', '=', 'menus.page_id')
                ->leftJoin('modules', 'modules.id', '=', 'menus.module_id')
                ->where('menu_site.name', 'frontend')
                ->where('menu_position.name', 'top')
                ->orderBy('default_order')
                ->get();
    }

    public function findBySlug($slug)
    {
        return
            DB::table('menus')
                ->where('slug', $slug)
                ->first();
    }

}
