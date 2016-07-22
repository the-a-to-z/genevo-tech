<?php

namespace App\Modules\Widgets;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ContactForm extends Model
{

    protected $table = 'module_widget_contact_form';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'response_message', 'module_id', 'css_class', 'show_title'
    ];

    public function findByModuleId($id)
    {
        $query =
            DB::table('module_widget_contact_form')
                ->where('module_id', $id)
                ->get();

        if(count($query) == 0) {
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
        return DB::table($this->table)->where('module_id', '=', $id)->first();
    }

}
