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
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        {{ $loggedInUser->name }} (<span class="small-description">{{ $loggedInUser->role->display_name }}</span>)

                        <b class="caret"></b>

                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Profile Setting</a></li>
                        <li><a href="#">Setting</a></li>
                        <li class="divider"></li>
                        <li><a href="/Action">Log Out</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>