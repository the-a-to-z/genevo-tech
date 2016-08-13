<?php

/***********************************************************************************************************************
 *                                      Setting helpers
 ***********************************************************************************************************************/

function getSetting($name, $resultField, $settings) {
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

function getSettingValue($name, $settings) {
    $settings = $settings->toArray();

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