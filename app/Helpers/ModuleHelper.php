<?php

/***********************************************************************************************************************
 *                                      Module helpers
 ***********************************************************************************************************************/

function backendModuleViewUrl($url) {
    return 'backend.modules.' . $url;
}

function backendModuleUrl($extraUrls = '') {
    return backendUrl('modules/' . $extraUrls);
}