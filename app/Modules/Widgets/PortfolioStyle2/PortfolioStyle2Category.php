<?php

namespace App\Modules\Widgets\PortfolioStyle2;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PortfolioStyle2Category extends Model
{

    protected $table = 'module_widget_portfolio_2_category';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'display_name'
    ];
    
}
