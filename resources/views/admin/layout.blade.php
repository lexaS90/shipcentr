<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>

    @section('style')
        <link href="{{ asset('adminka/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('adminka/css/datepicker3.css') }}" rel="stylesheet">
        <link href="{{ asset('adminka/css/bootstrap-table.css') }}" rel="stylesheet">
        <link href="{{ asset('adminka/css/styles.css') }}" rel="stylesheet">
@show

<!--Icons-->
    <script src="{{ asset('adminka/js/lumino.glyphs.js') }}"></script>

    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->

</head>

<body>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Принт Центр <span>ШИСумГУ</span></a>
        </div>

    </div><!-- /.container-fluid -->
</nav>

<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">

    <ul class="nav menu">
        <li class="{{ (url()->current() == route('home')) ? 'active' : '' }}">
            <a href="{{ route('home') }}" target="_blank">
                <svg class="glyph stroked home"><use xlink:href="#stroked-home"/></svg>
                Главная
            </a>
        </li>

        <li class="{{ (url()->current() == route('dashboard')) ? 'active' : '' }}">
            <a href="{{ route('dashboard') }}">
                <svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg>
                Панель управления
            </a>
        </li>

        <li class="{{ (url()->current() == route('order_list')) ? 'active' : '' }}">
            <a href="{{ route('order_list') }}">
                <svg class="glyph stroked basket "><use xlink:href="#stroked-basket"/></svg>
                Заказы


            </a>
        </li>

        <li class="{{ (url()->current() == route('settings')) ? 'active' : '' }}">
            <a href="{{ route('settings') }}">
                <svg class="glyph stroked gear"><use xlink:href="#stroked-gear"/></svg>
                Настройки
            </a>
        </li>

        <li>
            <a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <svg class="glyph stroked key "><use xlink:href="#stroked-key"/></svg>
                Выход
            </a>
            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>


        </li>

    </ul>

</div><!--/.sidebar-->

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">@yield('title')</h1>
        </div>
    </div><!--/.row-->

    @if (session('status'))
        <div class="alert bg-success" role="alert">
            <div>{{ session('status') }}</div>
        </div>
    @endif

    @if (count($errors) > 0)
        <div class="alert bg-danger" role="alert">
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif


    @yield('main')





</div><!--/.main-->

@section('script')
    <script src="{{ asset('adminka/js/jquery-1.11.1.min.js') }}"></script>
    <script src="{{ asset('adminka/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('adminka/js/chart.min.js') }}"></script>
    <script src="{{ asset('adminka/js/chart-data.js') }}"></script>
    <script src="{{ asset('adminka/js/easypiechart.js') }}"></script>
    <script src="{{ asset('adminka/js/easypiechart-data.js') }}"></script>
    <script src="{{ asset('adminka/js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('adminka/js/bootstrap-table.js') }}"></script>
@show
<script>
    !function ($) {
        $(document).on("click","ul.nav li.parent > a > span.icon", function(){
            $(this).find('em:first').toggleClass("glyphicon-minus");
        });
        $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
    }(window.jQuery);

    $(window).on('resize', function () {
        if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
    })
    $(window).on('resize', function () {
        if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
    })
</script>
</body>

</html>
