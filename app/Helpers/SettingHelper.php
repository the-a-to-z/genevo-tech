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

    return $return[$first_key][$resultField];
}