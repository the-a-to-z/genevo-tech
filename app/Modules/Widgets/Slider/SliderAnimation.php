<?php

namespace App\Modules\Widgets\Slider;

use Illuminate\Database\Eloquent\Model;

class SliderAnimation extends Model
{

    protected $table = 'module_slider_animation';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'class_animation', 'data_x', 'data_y','data_start', 'data_speed', 'data_customin', 'data_customout'
    ];

    public function sliderDetails()
    {
        return $this->belongsToMany('App\Modules\Widgets\Slider\SliderDetail');
    }
}
