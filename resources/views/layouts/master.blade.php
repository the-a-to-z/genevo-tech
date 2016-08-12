
<?php

    $themeHeader = getSettingValue('theme-header', $settings);

    $companyName = getSettingValue('company-name', $settings);
    $companyAddress = getSettingValue('company-address', $settings);
    $companyContactNumber = getSettingValue('company-contact-number', $settings);
    $companyContactEmail = getSettingValue('company-contact-email', $settings);

    $googleMap = getSettingValue('company-map-coordination', $settings);
    $googleMapCor = explode(', ', $googleMap);
    $googleMapLat = (isset($googleMapCor[0]) ? $googleMapCor[0] : null);
    $googleMapLng = (isset($googleMapCor[1]) ? $googleMapCor[1] : null);

    $pageTitle = (isset($pageTitle) ? $pageTitle : $companyName);
?>

@include('layouts.' . config('app.env'))
