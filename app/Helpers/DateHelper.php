<?php

/***********************************************************************************************************************
 *                                      Date helpers
 ***********************************************************************************************************************/

function displayDate($date) {
    return date("F d, Y", strtotime($date));
}

function addDay($day, $date) {
    return (new DateTime($date))
            ->add(new DateInterval("P".$day."D"))
            ->format('Y-m-d');
}