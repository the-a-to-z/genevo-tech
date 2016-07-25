<?php

/***********************************************************************************************************************
 *                                      Url helpers
 ***********************************************************************************************************************/

function backendUrlPath() {
    return config("constants.backend-url");
}

function backendUrlPathRoute() {
    return config("constants.backend-url-route");
}

function backendUrl($extraUrls = '') {
    return url(backendUrlPath() . $extraUrls);
}

function backendUrlRoute($moreRouteUrls, $params) {
    return route(backendUrlPathRoute() . $moreRouteUrls, $params);
}

function uploadPath($extra = ''){
	return 'uploads/' . $extra;
}

function uploadUrl($extra = ''){
    return url('uploads/' . $extra);
}

function getYoutubeImageUrl($url) {
    return str_replace('https://www.youtube.com/watch?v=', 'http://img.youtube.com/vi/', $url);
}

function getYoutubeImageThumbnailUrl($url) {
    return getYoutubeImageUrl($url) . '/mqdefault.jpg';
}

function getYoutubeImageMaxUrl($url) {
    return getYoutubeImageUrl($url) . '/maxresdefault.jpg';
}