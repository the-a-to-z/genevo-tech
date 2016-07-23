@define($widget = $data['widget'])
@define($module = $data['module'])

<div id="{{ $module->name }}" class="page-content{{ ($widget->css_class ? ' ' . $widget->css_class : '') }}">
    <div class="container">
        <div class="row">
            <div class="heading-title text-center">
                <h3 class="text-uppercase">{!! $widget->title !!}</h3>
            </div>

            @if($widget->theme == '')
            <div class="feature-box-grid">

                @foreach($widget->items()->get() as $item)

                <div class="col-md-4">
                    <div class="featured-item featured-item-img border-box text-center wow zoomIn" style="visibility: visible; animation-name: zoomIn;">
                        <div class="icon-img">
                            <img src="{{ uploadUrl('portfolio-style-1/' . $item->image) }}" alt="{{ $item->title }}">
                        </div>
                        <div class="title text-uppercase">
                            <h4>{!! $item->title !!} </h4>
                        </div>
                        <div class="desc">
                            {!! $item->description !!}
                        </div>
                    </div>
                </div>

                @endforeach

            </div>

            @else

                <div class="image-inline-list">
                    @foreach($widget->items()->get() as $item)
                        <div class="item">
                            <img src="{{ uploadUrl('portfolio-style-1/' . $item->image) }}" alt="{{ $item->title }}">
                        </div>
                    @endforeach
                </div>

            @endif

        </div>
    </div>
</div>