<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Принт Центр ШИСумГУ</title>

    <link rel="stylesheet" href="{{  asset('css/app.css') }}">
    <link rel="stylesheet" href="{{  asset('css/style.css') }}">

</head>
<body>


<nav class="navbar navbar-default">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header page-scroll">
            <a href="{{ route('home') }}" class="navbar-brand">{!! $site_name !!}</a>
        </div>


    </div>
    <!-- /.container-fluid -->
</nav>

@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

@if (count($errors) > 0)
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <div class="order-form">

        <form id="upload" method="post" action="{{  Route('order_add') }}" enctype="multipart/form-data">
            {{ csrf_field() }}

            <input type="hidden" name="files" value="{{ old('files') }}">

            <div class="form-group">
                <label>
                    Имя <span class="require">*</span>
                    <input type="text" name="name" value="{{ old('name') }}" required>
                </label>
            </div>

            <div class="form-group w50-left">
                <label>
                    Телефон <span class="require">*</span>
                    <input type="text" name="phone" value="{{ old('phone') }}" required>
                </label>
            </div>

            <div class="form-group w50-right">
                <label>
                    Email <span class="require">*</span>
                    <input type="email" name="email" value="{{ old('email') }}" required>
                </label>
            </div>

            <div class="clearfix"></div>


            <div class="form-group">
                <label>
                    Комментарий
                    <textarea name="comment">{{ old('comment') }}</textarea>
                </label>
            </div>

            <div class="upload-sec">

                <div id="drop">

                    <div class="drop-here">Переместите сюда файл</div>

                    <a>Загрузить</a>
                    <input type="file" name="upl" multiple />
                </div>

                <ul></ul>

            </div>

            <button type="submit" class="submit-btn">Отправить</button>


        </form>

    </div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="{{  asset('js/jquery.knob.js') }}"></script>
<script src="{{  asset('js/jquery.ui.widget.js') }}"></script>
<script src="{{  asset('js/jquery.iframe-transport.js') }}"></script>
<script src="{{  asset('js/jquery.fileupload.js') }}"></script>

<script src="{{  asset('js/script.js') }}"></script>

</body>
</html>