<?php

namespace App\Modules\Widgets\JobListing;

use Baum\Node;
use Illuminate\Support\Facades\DB;

/**
 * JobListingCategory
 */
class JobListingCategory extends Node
{

    protected $table = 'module_widget_job_listing_categories';

    protected $parentColumn = 'widget_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'widget_id', 'name', 'display_name'
    ];

    public function items()
    {
        return $this->belongsToMany('App\Modules\Widgets\JobListing\JobListingItem', 'module_widget_job_listing_item_categories', 'category_id', 'category_id');
    }

    public function findByModuleId($id)
    {
        return
            DB::table('module_widget_job_listing_categories as category')
                ->select('category.*')
                ->join('module_widget_job_listing as widget', 'widget.id', '=', 'category.widget_id')
                ->where('module_id', $id)
                ->get();

    }

    public function ofItemWithAllCategories($itemId)
    {
        return
            DB::table($this->table)
                ->rightJoin('module_widget_job_listing_categories as category', function ($join) use ($itemId) {
                    $join->on('category.id', '=', $this->table . '.category_id');
                    $join->on($this->table . '.item_id', '=', DB::raw($itemId));
                })
                ->get();
    }

}
