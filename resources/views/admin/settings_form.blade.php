@extends('admin/layout');

@section('title', 'Настройки')

@section('main')

    <div class="w80">
        <form role="form" method="post" action="{{ route('settings') }}">
            {{ csrf_field() }}

            <div class="form-group">
                <label>Название сайта</label>
                <input class="form-control" name="site_name" value="{!! $site_name !!}">
            </div>

            <div class="form-group">
                <label>Email для заказов</label>
                <input class="form-control" name="email" value="{{ $email }}">
            </div>

            <button type="submit" class="btn btn-primary">Сохранить</button>

        </form>
    </div>


@endsection