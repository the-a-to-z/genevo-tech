<?php

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

function hasPermission($userPermission, $permissions) {

    foreach($permissions as $permission) {
        if($userPermission == $permission->permission->name) {
            return true;
        }
    }

    return false;
}

function btnDelete($actionUrl, $id, $disabled = false) {
    if($disabled == true) {
        $disabled = ' disabled';
    }

    $markup = '<form method="POST" action="' . backendUrl($actionUrl . '/' . $id). '" accept-charset="UTF-8" class="form-inline" id="formDelete'. $id . '">';
    $markup .= csrf_field();
    $markup .= '<input name="_method" type="hidden" value="DELETE">';
    $markup .= '<button'. $disabled.' type="submit" class="btn btn-danger btn-mini btnSubmitDelete'. $disabled.'" id="btnSubmitDelete' . $id . '"><i class="fa fa-remove"></i></button>';
    $markup .= '</form>';

    return $markup;
}

function btnToCreate($actionUrl, $btnText) {
    $markup =  '<a href="' . backendUrl($actionUrl) . '" class="btn btn-primary btn-with-icon pull-right">';
    $markup .= '<i class="pe-7s-plus"></i> <p>' . $btnText . '</p>';
    $markup .= '</a>';

    return $markup;
}

function btnToEdit($actionUrl, $param = false) {
    if($param) {
        $url = backendUrl($actionUrl . '/' . $param . '/edit');
    } else {
        $url = backendUrl($actionUrl);
    }

    $markup = '<a href="' . $url . '" class="btn btn-primary btn-mini">';
    $markup .= '<i class="fa fa-wrench"></i>';
    $markup .= '</a>';

    return $markup;
}

function openFormCreate($actionUrl) {
    $markup = '<form role="form" method="POST" action="' . backendUrl($actionUrl). '">';
    $markup .= csrf_field();

    return $markup;
}

function openFormEdit($actionUrl, $param) {
    $markup = '<form method="POST" action="' . backendUrl($actionUrl . '/' . $param). '" accept-charset="UTF-8">';
    $markup .= '<input name="_method" type="hidden" value="PATCH">';
    $markup .= csrf_field();

    return $markup;
}

function closeForm() {
    return '</form>';
}

/**
 * Modules helper
 */

function backendModuleViewUrl($url) {
    return 'backend.modules.' . $url;
}

function backendModuleUrl($extraUrls = '') {
    return backendUrl('modules/' . $extraUrls);
}

/**
 * Text editor
 */

function textEditor($name, $value = null) {
    return '<textarea class="textEditor" name="'. $name . '">'. $value .'</textarea>';
}