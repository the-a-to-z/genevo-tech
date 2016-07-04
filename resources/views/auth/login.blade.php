<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css"
          integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link href="http://fonts.googleapis.com/css?family=Roboto:400,700,300" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ url('css/login.css') }}" rel="stylesheet">

</head>
<body>

<div id="clouds">
    <div class="cloud x1"></div>
    <!-- Time for multiple clouds to dance around -->
    <div class="cloud x2"></div>
    <div class="cloud x3"></div>
    <div class="cloud x4"></div>
    <div class="cloud x5"></div>
</div>

<div class="container">
    <div id="login">

        <form role="form" method="POST" action="{{ url('/login') }}">

            {{ csrf_field() }}

            <fieldset class="clearfix">

                @if ($errors->has('email'))
                    <span class="help-block">
                        {{ $errors->first('email') }}
                    </span>
                @endif

                <p class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <i class="fa fa-user"></i>
                    <input type="text"
                           placeholder="Email"
                           required
                           id="email"
                           name="email"
                           autofocus
                    >
                </p>

                <!-- JS because of IE support; better: placeholder="Username" -->
                <p class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <i class="fa fa-lock"></i>
                    <input id="password"
                           type="password"
                           name="password"
                           placeholder="Password"
                           required>
                </p>

                <p>
                <div class="checkbox">
                    <input type="checkbox" id="remember" name="remember">
                    <label for="remember">Remember me</label>
                </div>
                </p>

                <!-- JS because of IE support; better: placeholder="Password" -->
                <p>
                    <input type="submit" value="Login">
                </p>

            </fieldset>

        </form>

        <p>
            <a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
        </p>

    </div> <!-- end login -->

    <div id="logo">
        <h1>Logo</h1>
    </div>

</div>

</body>
</html>
