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
        'widget_id', 'name', 'display_name'
    ];

    public function itemCategory()
    {
        return $this->hasMany('App\Modules\Widgets\PortfolioStyle2\PortfolioStyle2ItemCategories', 'category_id');
    }

    public function findByModuleId($id)
    {
        return
            DB::table('module_widget_portfolio_2_category as category')
                ->select('category.*')
                ->join('module_widget_portfolio_2 as widget', 'widget.id', '=', 'category.widget_id')
                ->where('module_id', $id)
                ->get();

    }
    
}
