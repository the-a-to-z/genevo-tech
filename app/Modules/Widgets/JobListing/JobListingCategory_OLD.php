<?php

namespace App\Modules\Widgets\JobListing;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class JobListingCategory_OLD extends Model
{

    protected $table = 'module_widget_job_listing_categories';

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
        return $this->belongsToMany('App\Modules\Widgets\JobListing\JobListingItemCategory', 'module_widget_job_listing_item_categories', 'category_id', 'id');
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
    
}
