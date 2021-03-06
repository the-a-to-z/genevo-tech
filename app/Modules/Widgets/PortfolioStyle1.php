<?php

namespace App\Modules\Widgets;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PortfolioStyle1 extends Model
{

    protected $table = 'module_widget_portfolio_1';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description', 'module_id', 'css_class', 'theme'
    ];

    public function findByModuleId($id)
    {
        $query =
            DB::table('module_widget_portfolio_1')
                ->select('module_widget_portfolio_1.*')
                ->selectRaw('count(items.id) as total_items')
                ->leftJoin('module_widget_portfolio_1_items as items', 'items.widget_id', '=', 'module_widget_portfolio_1.id')
                ->where('module_id', $id)
                ->get();

        if (count($query) == 0) {
            return false;
        }

        return $query[0];
    }

    public function items()
    {
        return $this->hasMany('App\Modules\Widgets\PortfolioStyle1Item', 'widget_id');
    }

    /**
     * @param $id Module Id
     * @return mixed
     */
    public function viewData($id)
    {
        $item = new PortfolioStyle1Item();

        return [
            'portfolio' => DB::table($this->table)->where('module_id', $id)->first(),
            'portfolioItems' => $item->findByModuleId($id)
        ];
    }

}
