<?php

namespace App\Modules\Widgets\Slider;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Slider extends Model {

    protected $table = 'module_slider';

	protected $fillable = [
        'module_id', 'status'
    ];

    public function sliderDetails()
    {
        return $this->hasMany('App\Modules\Widgets\Slider\SliderDetail', 'slider_id');
    }
	
	public function viewData()
    {
        return DB::table($this->table)->first();
    }
	
	
}


