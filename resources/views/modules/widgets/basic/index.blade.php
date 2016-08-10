@define($widget = $data['widget'])
@define($module = $data['module'])

<div id="{{ $module->name }}" class="page-content{{ ($widget->css_class ? ' ' . $widget->css_class : '') }}">
    <div class="{{ $widget->full_width == 1 ? 'container-fluid' : 'container' }}">
        <div class="row">
            <div class="heading-title">
                @if($widget->show_title == 1)
                <h3 class="text-uppercase text-center">{{ $widget->title }}</h3>
                @endif

                <p class="center">
                    {!! $widget->description !!}
                </p>
            </div>
        </div>
    </div>
</div>