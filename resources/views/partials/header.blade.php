<header id="header" class="header-full-width {{ $themeHeader }}">

    <div class="header-sticky light-header">

        <div class="container">
            <div id="massive-menu" class="menuzord">

                <!--logo start-->
                <a href="{{ url('/') }}" class="logo-brand">
                    <!--<img src="img/logo-genovo-original.png" alt="">-->
                    @if(AppSetting::valueOf('company-logo'))
                        @if(AppSetting::valueOf('company-logo-image-type') == 'svg-code')
                            {!! AppSetting::valueOf('company-logo') !!}
                        @else
                            <img src="{{ url('/' . AppSetting::valueOf('company-logo')) }}" alt="AppSetting::valueOf('company-name')">
                        @endif
                    @else
                        <h1>{!! AppSetting::valueOf('company-name') !!}</h1>
                    @endif
                </a>
                <!--logo end-->

                <!--mega menu start-->
                <ul class="menuzord-menu pull-right op-nav">
                    @foreach($menus as $menu)


                        @if($menu->url)
                            <li>
                                <a href="{{ $menu->url }}">{{ $menu->name }}</a>
                            </li>
                        @else
                            <?php
                            $request = ($menu->page_name ? $menu->page_name : '/');
                            if($menu->module_id) {
                                $request = $request . '#' . $menu->module_name;
                            }
                            ?>

                            @if(Request::is($request))
                                <li class="active">
                                    <a href="" onclick="return false">
                                        {{ $menu->name }}
                                    </a>
                                </li>
                            @elseif(Request::segment(1) == $menu->page_name && Request::segment(1) != null)
                                <li class="active">
                                    <a href="" onclick="return false">
                                        {{ $menu->name }}
                                    </a>
                                </li>
                            @else
                                <li>
                                    <a href="{{ url($request) }}">{{ $menu->name }}</a>
                                </li>
                            @endif
                        @endif


                    @endforeach

                </ul>
                <!--mega menu end-->

            </div>
        </div>
    </div>

</header>