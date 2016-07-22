<?php

namespace App\Modules\Widgets;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PortfolioStyle1Item extends Model
{

    protected $table = 'module_widget_portfolio_1_items';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description', 'module_widget_portfolio_1_id', 'image'
    ];

    public function findByModuleId($id)
    {
        $query =
            DB::table('module_widget_portfolio_1')
                ->select('items.*')
                ->join('module_widget_portfolio_1_items as items', 'items.module_widget_portfolio_1_id', '=', 'module_widget_portfolio_1.id')
                ->where('module_id', $id)
                ->get();

        return $query;
    }

}
