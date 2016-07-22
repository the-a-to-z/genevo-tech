<?php

namespace App\Modules\Widgets\JobListing;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class JobListingCategory extends Model
{

    protected $table = 'module_widget_job_listing_category';

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
        return $this->hasMany('App\Modules\Widgets\JobListing\JobListingItemCategories', 'category_id');
    }

    public function findByModuleId($id)
    {
        return
            DB::table('module_widget_job_listing_category as category')
                ->select('category.*')
                ->join('module_widget_job_listing as widget', 'widget.id', '=', 'category.widget_id')
                ->where('module_id', $id)
                ->get();

    }
    
}
