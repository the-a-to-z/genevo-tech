
<div id="{{ $moduleName }}" class="page-content{{ ($data->css_class ? ' ' . $data->css_class : '') }}">
    <div class="container">
        <div class="row">
            <div class="heading-title">
                <h3 class="text-uppercase text-center">{{ $data->title }}</h3>

                <p class="center">
                    {!! $data->description !!}
                </p>
            </div>
        </div>
    </div>
</div>