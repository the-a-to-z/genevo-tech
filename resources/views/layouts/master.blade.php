@define($pageTitle = (isset($pageTitle) ? $pageTitle : (getSettingValue('company-name', $settings))))

@if(config('app.env') == 'local')
    @include('layouts.local')
@else
    @include('layouts.production')
@endif