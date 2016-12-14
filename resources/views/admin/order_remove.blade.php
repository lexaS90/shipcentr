@extends('admin/layout');

@section('title', 'Удаление заказа')

@section('main')

    <div class="alert bg-danger" role="alert">
        <div>Вы действительно хотите удалить заказ?</div>
    </div>

    <div class="w80">

        <form role="form" method="post" action="{{ route('order_remove',['orderId' => $id]) }}">
            {{ csrf_field() }}
            <input type="hidden" name="id" value="{{ $id }}">

            <button type="submit" class="btn btn-primary">Подтвердить</button>
            <a href="{{ route('order_list') }}" class="btn btn-default">Отмена</a>

        </form>
    </div>


@endsection