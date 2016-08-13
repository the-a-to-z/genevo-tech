<?php

use App\Setting;

class AppSetting
{

    protected static $settings;

    public static function get()
    {
        if(self::$settings == null) {
            self::$settings = Setting::get();
        }

        return self::$settings;
    }

    public static function valueOf($name)
    {
        $settings = self::get()->toArray();

        $return = array_filter($settings, function ($row) use ($name) {
            return $row['name'] == $name;
        });

        reset($return);
        $first_key = key($return);

        if(!isset($return[$first_key]['value'])) {
            return null;
        }

        return $return[$first_key]['value'];
    }
}