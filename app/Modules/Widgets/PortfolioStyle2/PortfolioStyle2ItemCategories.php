<?php

namespace App\Modules\Widgets\PortfolioStyle2;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PortfolioStyle2ItemCategories extends Model
{

    protected $table = 'module_widget_portfolio_2_item_categories';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'item_id', 'category_id'
    ];
    
}
