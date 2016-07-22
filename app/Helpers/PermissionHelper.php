<?php

/***********************************************************************************************************************
 *                                      Permission helpers
 ***********************************************************************************************************************/

function hasPermission($userPermission, $permissions) {

    foreach($permissions as $permission) {
        if($userPermission == $permission->permission->name) {
            return true;
        }
    }

    return false;
}