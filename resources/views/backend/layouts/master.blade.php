<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <link rel="icon" type="image/png" href="img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>

    <title>GeneVo Technology Admin</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'/>
    <meta name="viewport" content="width=device-width"/>

    <!-- Bootstrap core CSS     -->
    <link href="{{ url('css/bootstrap.min.css') }}" rel="stylesheet"/>

    <!-- Animation library for notifications   -->
    <link href="{{ url('css/animate.min.css') }}" rel="stylesheet"/>

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="{{ url('css/pe-icon-7-stroke.css') }}" rel="stylesheet"/>

    <link rel="stylesheet" href="{{ url('vendors/mui/mui.min.css') }}">

    @yield('style')

    <!--  Light Bootstrap Table core CSS    -->
    <link href="{{ url('css/light-bootstrap-dashboard.css') }}" rel="stylesheet"/>

    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="{{ url('css/backend.css') }}" rel="stylesheet"/>

</head>
<body>

<div class="wrapper">

    @include('backend.layouts.left-sidebar')

    <div class="main-panel">

        @include('backend.layouts.page-header')

        @yield('content')

    </div>
</div>

@yield('modal')

<!--   Core JS Files   -->
<script src="{{ url('js/jquery-1.10.2.js') }}" type="text/javascript"></script>
<script src="{{ url('js/bootstrap.min.js') }}" type="text/javascript"></script>

<!--  Checkbox, Radio & Switch Plugins -->
<script src="{{ url('js/bootstrap-checkbox-radio-switch.js') }}"></script>

<script src="{{  url('vendors/mui/mui.min.js')  }}"></script>

<!--  Charts Plugin -->
<script src="{{ url('js/chartist.min.js') }}"></script>

<!--  Notifications Plugin    -->
<script src="{{ url('js/bootstrap-notify.js') }}"></script>

<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>

<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
<script src="{{ url('js/light-bootstrap-dashboard.js') }}"></script>

<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
<script src="{{ url('js/backend.js') }}"></script>

<script type="text/javascript">
    $(document).ready(function () {
        backend.initChartist();

        @if(Session::has('flash_message'))

        $.notify({
            icon: 'pe-7s-info',
            message: "{!! Session::get('flash_message') !!}"
        }, {
            type: "{!! (Session::has('flash_message_type') ? Session::get('flash_message_type') : 'info') !!}",
            timer: 4000
        });

        @endif

    });
</script>

@yield('script')

@section('text-editor')
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>
        $(document).ready(function () {
            var toolbar = "styleselect | removeformat | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | table | link";
            tinymce.init({
                selector:'textarea.textEditorSmall' ,
                content_css: "{{ url('css/backend-tinymce-content.css') }}",
                height : 120,
                plugins: "link, table",
                menubar: true,
                toolbar: toolbar,
                setup: function (editor) {
                    editor.on('change', function () {
                        editor.save();
                    });
                }
            });

            tinymce.init({
                selector:'textarea.textEditor' ,
                content_css: "{{ url('css/backend-tinymce-content.css') }}",
                height : 300,
                plugins: "link, table",
                menubar: false,
                toolbar: toolbar,
                setup: function (editor) {
                    editor.on('change', function () {
                        editor.save();
                    });
                }
            });

        });
    </script>
@show

@yield('importantScript')

</body>
</html>