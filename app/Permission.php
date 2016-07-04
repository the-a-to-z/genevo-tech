<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Permission extends Authenticatable
{

    protected $table = 'permission';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'display_name'
    ];

    public function menu()
    {
        return $this->hasOne('App\Menu');
    }

    public function rolePermission()
    {
        return $this->hasOne('App\RolePermission');
    }

}
