<div class="sidebar" data-color="black">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="{{ backendUrl() }}" class="simple-text">
                Genevo Technology
            </a>
        </div>

        <ul class="nav">
            @foreach($leftMenus as $menu)

            <li {{ (Request::is(config('constants.backend-url') . $menu->slug) ? 'class=active' : '') }}>
                <a href="{{ url(config('constants.url.backend-prefix') . '/' . $menu->slug) }}">
                    <i class="{{ $menu->css_icon_class }}"></i>
                    <p>{{ $menu->name }}</p>
                </a>
            </li>

            @endforeach

        </ul>
    </div>
</div>