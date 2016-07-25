@define($widget = $data['widget'])
@define($module = $data['module'])

<div id="{{ $module->name }}" class="page-content{{ ($widget->css_class ? ' ' . $widget->css_class : '') }}">
    <div class="container">

        <div class="row">
            <div class="heading-title text-center">
                <h3 class="text-uppercase">{!! $widget->title !!}</h3>
            </div>

            @if($widget->show_category_filter == '1')
                <div class="text-center">
                    <ul class="portfolio-filter">
                        <li class="active"><a href="#" data-filter="*"> All</a></li>
                        @foreach($widget->categories as $category)
                            <li>
                                <a href="#" data-filter=".{{ $category->name }}">
                                    {{ $category->display_name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @define($slideAnimations = ['slideInLeft', 'slideInTop', 'slideInBottom', 'slideInRight'])

            <div class="portfolio portfolio-with-title col-{{ $widget->display_per_column }} {{ $widget->display_item_wide ? '' : 'gutter' }}">
                @foreach($widget->items()->get() as $item)

                @define($categories = '');
                @define($categoryDisplays = '');

                @foreach($item->itemCategory as $itemCategory)
                    <?php $categories .= ' ' . $itemCategory->category->name;?>
                    <?php $categoryDisplays .= '<a href="#">' . $itemCategory->category->display_name . '</a>, ';?>
                @endforeach

                @define($animation = $slideAnimations[array_rand($slideAnimations)])

                <div class="portfolio-item{{ $categories }} {{ $animation }}" style="visibility: visible; animation-name: {{ $animation }}">

                    @if($item->youtube_video)
                        <div class="thumb">
                            <img src="{{ getYoutubeImageMaxUrl($item->youtube_video) }}" alt="">
                            <div class="portfolio-hover">
                                <div class="action-btn">
                                    <a class="popup-vimeo text-danger" href="{{ $item->youtube_video }}">
                                        <i class="icon-arrows_keyboard_right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="portfolio-title">
                            <h4><a class="popup-vimeo" href="{{ $item->youtube_video }}">{{ $item->title }}</a></h4>
                        </div>
                    @else
                    <a href="{{ url(str_slug($module->name) . '/' . str_slug($item->title)) }}">
                        <div class="thumb">
                            <img src="{{ uploadUrl('portfolio-style-2/thumbnails/' . $item->image) }}" alt="{{ $item->title }}">
                            <div class="portfolio-hover">
                                <div class="action-btn">
                                    <i class="icon-basic_link"></i>
                                </div>
                            </div>
                        </div>
                    </a>

                    <div class="portfolio-title">
                        <h4 class="m-bot-0">
                            <a href="{{ url(str_slug($module->name) . '/' . str_slug($item->title)) }}">
                                {{ $item->title }}
                            </a>
                        </h4>
                        <p>
                            {!! rtrim($categoryDisplays, ',') !!}
                        </p>
                    </div>

                    @endif

                </div>

                @endforeach

            </div>

        </div>
    </div>
</div>

{{--<!--career-aspiration-->--}}
{{--<div class="p-top-30-impt page-content gray-bg text-center m-bot-20">--}}
    {{--<div class="container">--}}
        {{--<div class="row">--}}
            {{--<div class="col-md-8 col-md-offset-2">--}}
                {{--<div class="career-aspiration-info m-bot-less">--}}
                    {{--<h3 class="p-top-0">--}}
                        {{--We are very happy if we can be a help for you.--}}
                    {{--</h3>--}}
                {{--</div>--}}
                {{--<div class="career-aspiration-form">--}}
                    {{--<a href="#contact" class="btn btn-medium btn-rounded btn-dark-solid text-uppercase">--}}
                        {{--Click here--}}
                    {{--</a>--}}

                    {{--<label>to consult with us.</label>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}
{{--<!--career-aspiration-->--}}