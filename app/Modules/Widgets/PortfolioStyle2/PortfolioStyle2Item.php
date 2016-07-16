<?php

namespace App\Modules\Widgets\PortfolioStyle2;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PortfolioStyle2Item extends Model
{

    protected $table = 'module_widget_portfolio_2_items';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'slug', 'title', 'description', 'widget_id', 'image'
    ];

    public function itemCategory()
    {
        return $this->hasMany('App\Modules\Widgets\PortfolioStyle2\PortfolioStyle2ItemCategories', 'item_id');
    }

    public function module()
    {
        return $this->belongsTo('App\Modules\Widgets\PortfolioStyle2\PortfolioStyle2');
    }

    public function findByModuleId($id)
    {
        $query =
            DB::table('module_widget_portfolio_2')
                ->select('items.*')
                ->join('module_widget_portfolio_2_items as items', 'items.widget_id', '=', 'module_widget_portfolio_2.id')
                ->where('module_id', $id)
                ->get();

        if (count($query) == 0) {
            return false;
        }

        return $query;
    }


    public function findByModuleIdAndItemSlug($id, $itemSlug)
    {
        $query =
            DB::table('module_widget_portfolio_2')
                ->select('items.*')
                ->join('module_widget_portfolio_2_items as items', 'items.widget_id', '=', 'module_widget_portfolio_2.id')
                ->where('module_id', $id)
                ->where('slug', $itemSlug)
                ->first();

        if (count($query) == 0) {
            return false;
        }

        return $query;
    }

}
