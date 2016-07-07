<?php

namespace App\Modules;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

class HomeSlideshow extends Authenticatable
{

    protected $table = 'module_slider';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'image', 'status'
    ];

    /**
     * @return mixed
     */
    public function viewData()
    {
        return DB::table($this->table)->first();
    }

}
