<?php

namespace App\Modules\Widgets\PeopleProfile;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * PeopleProfileItem
 */
class PeopleProfileItem extends Model
{

    /**
     * Table name.
     *
     * @var string
     */
    protected $table = 'module_widget_people_profile_items';

    protected $fillable = [
        'slug',
        'name',
        'short_description',
        'profile_photo',
        'facebook_link',
        'google_link',
        'twitter_link',
        'linkedin_link',
        'description',
        'widget_id'
    ];

    public function parent()
    {
        return $this->belongsTo('App\Modules\Widgets\PeopleProfile\PeopleProfile');
    }

    public function findByModuleId($id)
    {
        return
            DB::table('module_widget_people_profile')
                ->select('items.*')
                ->join('module_widget_people_profile_items as items', 'items.widget_id', '=', 'module_widget_people_profile.id')
                ->where('module_id', $id)
                ->get();
    }

    public function findByModuleIdAndItemSlug($id, $itemSlug)
    {
        $query =
            DB::table('module_widget_people_profile')
                ->select('items.*')
                ->join('module_widget_people_profile_items as items', 'items.widget_id', '=', 'module_widget_people_profile.id')
                ->where('module_id', $id)
                ->where('slug', $itemSlug)
                ->first();

        if (count($query) == 0) {
            return false;
        }

        return $query;
    }

}
