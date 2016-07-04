<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

class Page extends Authenticatable
{

    protected $table = 'pages';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'url', 'created_by', 'updated_by', 'active'
    ];

    public function menu()
    {
        return $this->hasOne('App\Menu');
    }

    public function pageModule()
    {
        return $this->belongsTo('App\PageMenu');
    }

}
