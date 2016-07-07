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
	return url('uploads/' . $extra);
}


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


/***********************************************************************************************************************
 *                                      Form helpers
***********************************************************************************************************************/

function btnDelete($actionUrl, $id, $disabled = false) {
    if($disabled == true) {
        $disabled = ' disabled';
    }

    $markup = '<form method="POST" action="' . backendUrl($actionUrl . '/' . $id)
            . '" accept-charset="UTF-8" class="form-inline" id="formDelete'. $id . '">';
    $markup .= csrf_field();
    $markup .= '<input name="_method" type="hidden" value="DELETE">';
    $markup .= '<button'. $disabled.' type="submit" class="btn btn-danger btn-mini '
            . btnDeleteHtmlClass() . $disabled.'" id="btnSubmitDelete' . $id . '"><i class="fa fa-remove"></i></button>';
    $markup .= '</form>';

    return $markup;
}

function btnToCreate($actionUrl, $btnText, $autoComplete = true) {
    $markup = '<a href="' . backendUrl($actionUrl . ($autoComplete ? '/create' : ''))
                . '" class="btn btn-primary btn-fill btn-with-icon pull-right ' . btnToCreateHtmlClass() . '">';
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

    $markup = '<a href="' . $url . '" class="btn btn-primary btn-mini ' . btnToEditHtmlClass() . '">';
    $markup .= '<i class="fa fa-wrench"></i>';
    $markup .= '</a>';

    return $markup;
}

function btnSubmitCreateHtmlId() {
    return 'btnSubmitCreate';
}

function btnSubmitEditHtmlId() {
    return 'btnSubmitEdit';
}

function formEditHtmlId() {
    return 'formEdit';
}

function btnToCreateHtmlClass() {
    return 'btnToCreate';
}

function btnDeleteHtmlClass() {
    return 'btnDelete';
}

function btnToEditHtmlClass() {
    return 'btnToEdit';
}

function formCreateHtmlId() {
    return 'formCreate';
}

function openFormCreate($actionUrl) {
    $markup = '<form role="form" method="POST" action="' . backendUrl($actionUrl). '" id=' . formCreateHtmlId() . '>';
    $markup .= csrf_field();

    return $markup;
}

function openFormEdit($actionUrl, $param) {
    $markup = '<form method="POST" action="' . backendUrl($actionUrl . '/' . $param). '" accept-charset="UTF-8" id=' . formEditHtmlId(). '>';
    $markup .= '<input name="_method" type="hidden" value="PATCH">';
    $markup .= csrf_field();

    return $markup;
}

function closeForm() {
    return '</form>';
}

function formCreateFooter($action) {
    $markup =  '<footer class="form-fixed-footer">';
    $markup .= '<div class="container-fluid">';
    $markup .= '<button type="submit" class="btn btn-info btn-fill pull-right m-left-5" id="' . btnSubmitCreateHtmlId(). '">Create</button>';
    $markup .= '<a href="' . backendUrl($action). '" class="btn btn-danger btn-fill pull-right">Cancel</a>';
    $markup .= '</div>';
    $markup .= '</footer>';

    return $markup;
}

function formEditFooter($action) {
    $markup =  '<footer class="form-fixed-footer">';
    $markup .= '<div class="container-fluid">';
    $markup .= '<button type="submit" class="btn btn-info btn-fill pull-right m-left-5" id="' . btnSubmitEditHtmlId(). '">Update</button>';
    $markup .= '<a href="' . backendUrl($action). '" class="btn btn-danger btn-fill pull-right">Cancel</a>';
    $markup .= '</div>';
    $markup .= '</footer>';

    return $markup;
}

function formError($error) {
    return '<div class="input-error-message">' . $error . '&nbsp;</div>';
}

function formErrorInline($error) {
    return '<span class="input-error-message">' . $error . '&nbsp;</span>';
}

function buttonChooseIcon($inputName, $value = '') {
    $markup = '<div class="icon-control">';
    $markup .= '<input type="hidden" name="' . $inputName . '" class="form-control" value="' . $value . '">';
    $markup .= '<button type="button" class="btn btn-default form-control choose-icon" data-toggle="modal" data-target="#iconModal">';
    if($value) {
        $markup .= '<span class="icon ' . $value . '"></span><span>' . $value . '</span>';
    } else {
        $markup .= 'Click to choose an icon';
    }

    $markup .= '</button>';
    $markup .= '</div>';

    return $markup;
}

/***********************************************************************************************************************
 *                                      Module helpers
 ***********************************************************************************************************************/

function backendModuleViewUrl($url) {
    return 'backend.modules.' . $url;
}

function backendModuleUrl($extraUrls = '') {
    return backendUrl('modules/' . $extraUrls);
}


/***********************************************************************************************************************
 *                                      Text Editor helpers
 ***********************************************************************************************************************/
function textEditor($name, $value = null) {
    return '<textarea class="textEditor" name="'. $name . '">'. $value .'</textarea>';
}
