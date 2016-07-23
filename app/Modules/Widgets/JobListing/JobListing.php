<?php

namespace App\Modules\Widgets\JobListing;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class JobListing extends Model
{

    protected $table = 'module_widget_job_listing';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'show_category_filter','description', 'module_id', 'css_class', 'theme', 'display_per_page'
    ];

    public function items()
    {
        return $this->hasMany('App\Modules\Widgets\JobListing\JobListingItem', 'widget_id');
    }

    public function categories()
    {
        return $this->hasMany('App\Modules\Widgets\JobListing\JobListingCategory', 'widget_id');
    }

    public function paginateItems($displayPerPage = 20)
    {
        return $this->items()->paginate($displayPerPage);
    }

    public function findByModuleId($id)
    {
        $query =
            DB::table('module_widget_job_listing')
                ->select('module_widget_job_listing.*')
                ->selectRaw('count(items.id) as total_items')
                ->leftJoin('module_widget_job_listing_items as items', 'items.widget_id', '=', 'module_widget_job_listing.id')
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
        return [];
    }

    public function findDetail($id, $itemSlug)
    {
        $item = new JobListingItem();

        return $item->findByModuleIdAndItemSlug($id, $itemSlug);
    }

}
