@define($widget = $data['widget'])
@define($module = $data['module'])

@section('style')
    @parent
    <link href="{{ url('css/modules/people-profile/frontend.css') }}" rel="stylesheet">
@endsection

<div id="{{ $module->name }}" class="people-profile page-content{{ ($widget->css_class ? ' ' . $widget->css_class : '') }}">
    <div class="container">

        <div class="row">
            <div class="heading-title text-center">
                <h3 class="text-uppercase">{{ $widget->title }}</h3>
                <p class="half-txt p-top-30">
                    {!! $widget->description !!}
                </p>
            </div>

            @define($slideAnimations = ['slideInLeft', 'zoomIn', 'slideInRight'])

            @foreach($widget->items()->get() as $item)

            <div class="col-md-4">
                @define($animation = $slideAnimations[array_rand($slideAnimations)])
                <div class="person wow {{ $animation }}" style="visibility: visible; animation-name: {{ $animation }}">
                    <div class="person-img">
                        <img src="{{ uploadUrl('people-profile/' . $item->profile_photo) }}" alt="{{ $item->name }}">
                        <div class="person-intro light-txt">
                            <h5>{{ $item->name }}</h5>
                            <span>{!! $item->short_description !!}</span>
                        </div>
                    </div>
                    <div class="person-hover">
                        <div class="desk">
                            {!! $item->description !!}
                        </div>
                        <div class="s-link">
                            @if($item->facebook_link)
                            <a href="{{ $item->facebook_link }}" target="_blank">
                                <i class="fa fa-facebook"></i>
                            </a>
                            @endif

                            @if($item->twitter_link)
                            <a href="{{ $item->twitter_link }}" target="_blank">
                                <i class="fa fa-twitter"></i>
                            </a>
                            @endif

                            @if($item->google_link)
                            <a href="{{ $item->google_link }}" target="_blank">
                                <i class="fa fa-google-plus"></i>
                            </a>
                            @endif

                            @if($item->linkedin_link)
                                <a href="{{ $item->linkedin_link }}" target="_blank">
                                    <i class="fa fa-linkedin"></i>
                                </a>
                            @endif

                        </div>
                    </div>
                </div>
            </div>

            @endforeach

        </div>
    </div>
</div>