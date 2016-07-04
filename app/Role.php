<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

class Role extends Authenticatable
{

//    use EntrustUserTrait;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'display_name', 'description',
    ];

    public function user()
    {
        return $this->hasMany('App\User');
    }

    public function findRoot()
    {
        $query =
            DB::table('roles')
                ->select('id', 'name', 'display_name', 'description')
                ->where('name', '=', 'root')
                ->limit(1)
                ->get();

        if(count($query) == 0) {
            die('User root not defined!!');
        }

        return $query[0];
    }

}
