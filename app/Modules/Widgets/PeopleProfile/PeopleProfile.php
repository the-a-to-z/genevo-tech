<?php

namespace App\Modules\Widgets\PeopleProfile;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PeopleProfile extends Model
{

    protected $table = 'module_widget_people_profile';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title','description', 'module_id', 'css_class'
    ];

    public function items()
    {
        return $this->hasMany('App\Modules\Widgets\PeopleProfile\PeopleProfileItem', 'widget_id');
    }

    public function findByModuleId($id)
    {
        $query =
            DB::table('module_widget_people_profile')
                ->select('module_widget_people_profile.*')
                ->selectRaw('count(items.id) as total_items')
                ->leftJoin('module_widget_people_profile_items as items', 'items.widget_id', '=', 'module_widget_people_profile.id')
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
        $item = new PeopleProfileItem();

        return $item->findByModuleIdAndItemSlug($id, $itemSlug);
    }

}
