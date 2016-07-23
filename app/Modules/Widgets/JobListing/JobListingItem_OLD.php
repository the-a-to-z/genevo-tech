<?php

namespace App\Modules\Widgets\JobListing;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class JobListingItem extends Model
{

    protected $table = 'module_widget_job_listing_items';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'slug', 'job_title', 'company', 'close_on', 'description', 'widget_id', 'image'
    ];

    public function categories()
    {
        return $this->belongsToMany('App\Modules\Widgets\JobListing\JobListingItemCategory', 'module_widget_job_listing_item_categories', 'item_id', 'id');
    }

    public function module()
    {
        return $this->belongsTo('App\Modules\Widgets\JobListing\JobListing');
    }

    public function scopeCategorized($query, JobListingCategory $category = null)
    {
        if (is_null($category)) return $query->with('categories');

        $categoryIds = $category->getDescendantsAndSelf()->lists('id');

        return $query->with('categories')
            ->join('module_widget_job_listing_item_categories', 'module_widget_job_listing_item_categories.product_id', '=', 'module_widget_job_listing_item.id')
            ->whereIn('module_widget_job_listing_item_categories.category_id', $categoryIds);
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
