<?php

namespace App\Modules\Widgets\Slider;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SliderItem extends Model {

    protected $table = 'module_slider_items';

	protected $fillable = [
        'title', 'image', 'status','slider_id'
    ];

    public function sliderDetails()
    {
        return $this->hasMany('App\Modules\Widgets\Slider\SliderDetail', 'slider_item_id');
    }
	
	public function viewData()
    {
        return DB::table($this->table)->first();
    }
	
	
}


