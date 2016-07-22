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

    public function itemCategory()
    {
        return $this->hasMany('App\Modules\Widgets\JobListing\JobListingItemCategories', 'item_id');
    }

    public function module()
    {
        return $this->belongsTo('App\Modules\Widgets\JobListing\JobListing');
    }

    public function findByModuleId($id)
    {
        $query =
            DB::table('module_widget_job_listing')
                ->select('items.*')
                ->join('module_widget_job_listing_items as items', 'items.widget_id', '=', 'module_widget_job_listing.id')
                ->where('module_id', $id)
                ->paginate(2);

        if (count($query) == 0) {
            return false;
        }

        return $query;
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
