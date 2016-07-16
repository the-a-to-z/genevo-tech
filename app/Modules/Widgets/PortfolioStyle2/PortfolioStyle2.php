<?php

namespace App\Modules\Widgets\PortfolioStyle2;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PortfolioStyle2 extends Model
{

    protected $table = 'module_widget_portfolio_2';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'show_category_filter','description', 'module_id', 'css_class'
    ];

    public function items()
    {
        return $this->hasMany('App\Modules\Widgets\PortfolioStyle2\PortfolioStyle2Item', 'widget_id');
    }

    public function categories()
    {
        return $this->hasMany('App\Modules\Widgets\PortfolioStyle2\PortfolioStyle2Category', 'widget_id');
    }

    public function findByModuleId($id)
    {
        $query =
            DB::table('module_widget_portfolio_2')
                ->select('module_widget_portfolio_2.*')
                ->selectRaw('count(items.id) as total_items')
                ->leftJoin('module_widget_portfolio_2_items as items', 'items.widget_id', '=', 'module_widget_portfolio_2.id')
                ->where('module_id', $id)
                ->get();

        if (count($query) == 0) {
            return false;
        }

        return $query[0];
    }

    /**
     * @param $id Module Id
     * @return mixed
     */
    public function viewData($id)
    {
        return [
           // 'portfolio' => DB::table($this->table)->where('module_id', $id)->first(),
           // 'portfolioItems' => $item->findByModuleId($id)
            'portfolio' => PortfolioStyle2::where('module_id', $id)->first()
        ];
    }

    public function findDetail($id, $itemSlug)
    {
        $item = new PortfolioStyle2Item();

        return $item->findByModuleIdAndItemSlug($id, $itemSlug);
    }

}
