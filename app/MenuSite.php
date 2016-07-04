<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class MenuSite extends Authenticatable
{

    protected $table = 'menu_site';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'slug'
    ];

    public function menu()
    {
        return $this->hasMany('App\Menu');
    }
}
