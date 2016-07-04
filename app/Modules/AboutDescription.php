<?php

namespace App\Modules;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

class AboutDescription extends Authenticatable
{

    protected $table = 'module_about_description';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description', 'hide_title'
    ];

    public function viewData()
    {
        return DB::table($this->table)->first();
    }

}
