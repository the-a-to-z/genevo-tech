<?php

use App\Setting;

class AppSetting
{

    private $settings;

    /**
     * Setting constructor.
     * @param $settings
     */
    public function __construct(Setting $settings)
    {
        $this->settings = $settings;
    }

    public function get()
    {
        return $this->settings;
    }

    public static function valueOf(Setting $settings, $resultField)
    {
        $settings = $settings->toArray();

        $return = array_filter($settings, function ($row) use ($name) {
            return $row['name'] == $name;
        });

        reset($return);
        $first_key = key($return);

        if(!isset($return[$first_key][$resultField])) {
            return null;
        }

        return $return[$first_key][$resultField];
    }
}