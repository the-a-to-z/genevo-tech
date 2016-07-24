<?php

namespace App\Modules\Widgets\JobListing;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * JobListingItem
 */
class JobListingItem extends Model
{

    /**
     * Table name.
     *
     * @var string
     */
    protected $table = 'module_widget_job_listing_items';

    protected $fillable = [
        'slug', 'job_title', 'company', 'close_on', 'description', 'widget_id', 'image'
    ];

    public function categories()
    {
        return $this->belongsToMany('App\Modules\Widgets\JobListing\JobListingCategory', 'module_widget_job_listing_item_categories', 'item_id', 'category_id');
    }

    public function module()
    {
        return $this->belongsTo('App\Modules\Widgets\JobListing\JobListing');
    }

    public function findByModuleId($id)
    {
        return
            DB::table('module_widget_job_listing')
                ->select('items.*')
                ->join('module_widget_job_listing_items as items', 'items.widget_id', '=', 'module_widget_job_listing.id')
                ->where('module_id', $id)
                ->get();
    }

    public function findByCategory($categorySlug)
    {
        return
            DB::table('module_widget_job_listing_items as items')
                ->select('items.*')
                ->join('module_widget_job_listing_item_categories as item_category', 'item_category.item_id', '=', 'items.id')
                ->join('module_widget_job_listing_categories as category', 'category.id', '=', 'item_category.category_id')
                ->where('category.name', $categorySlug)
                ->get();
    }

    public function findByModuleIdAndItemSlug($id, $itemSlug)
    {
        $query =
            DB::table('module_widget_job_listing')
                ->select('items.*')
                ->join('module_widget_job_listing_items as items', 'items.widget_id', '=', 'module_widget_job_listing.id')
                ->where('module_id', $id)
                ->where('slug', $itemSlug)
                ->first();

        if (count($query) == 0) {
            return false;
        }

        return $query;
    }

}
