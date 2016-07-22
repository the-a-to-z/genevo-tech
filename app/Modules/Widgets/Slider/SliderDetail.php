<?php

namespace App\Modules\Widgets\Slider;

use Illuminate\Database\Eloquent\Model;

class SliderDetail extends Model
{

    protected $table = 'module_slider_detail';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'text', 'color', 'font_size','slider_item_id'
    ];

    public function sliderItem()
    {
        return $this->belongsTo('App\Modules\Widgets\Slider\SliderItem', 'slider_item_id');
    }
}
