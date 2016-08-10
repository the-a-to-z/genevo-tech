<nav class="navbar navbar-default navbar-fixed">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target="#navigation-example-2">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ url('/' . config('constants.url.backend-prefix')) }}"></a>
        </div>
        <div class="collapse navbar-collapse">

            @if(isset($breadcrumbs))
                <ul class="breadcrumb">
                    <?php
                    $i = 0;
                    $breadcrumbsCount = count($breadcrumbs);
                    ?>
                    @foreach($breadcrumbs as $name => $url)
                        <?php $i++; ?>
                        <li>
                            <a href="{{ url(backendUrl($url)) }}">
                                {{ $name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            @endif

            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="{{ url('/') }}" target="_blank">
                        <i class="fa fa-globe"></i> View site
                    </a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-user"></i> {{ $loggedInUser->name }} (<span class="small-description">{{ $loggedInUser->role->display_name }}</span>)

                        <b class="caret"></b>

                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Profile Setting</a></li>
                        <li><a href="{{ backendUrl('settings') }}">Setting</a></li>
                        <li class="divider"></li>
                        <li><a href="{{ url('/logout') }}">Log Out</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>