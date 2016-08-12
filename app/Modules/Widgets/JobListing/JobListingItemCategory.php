<?php
namespace App\Modules\Widgets\JobListing;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * JobListingItemCategory
 */
class JobListingItemCategory extends Model
{

    protected $table = 'module_widget_job_listing_item_categories';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'item_id', 'category_id'
    ];

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
