@extends('admin/layout');

@section('title', 'Редактирование заказа')

@section('main')

    <div class="w80">
        <form role="form" method="post" action="{{ route('order_update',['orderId' => $id]) }}">
            {{ csrf_field() }}
            <input type="hidden" name="id" value="{{ $id }}">

            <div class="form-group">
                <label>Имя</label>
                <input class="form-control" name="name" value="{{ $name }}">
            </div>

            <div class="form-group">
                <label>Телефон</label>
                <input class="form-control" name="phone" value="{{ $phone }}">
            </div>

            <div class="form-group">
                <label>Email</label>
                <input class="form-control" name="email" value="{{ $email }}">
            </div>

            <div class="form-group">
                <label>Статус</label>
                <select class="form-control" name="status">
                    <option value="0" {{$status == 0 ? 'selected' : ''}}>Не обработано</option>
                    <option value="1" {{$status == 1 ? 'selected' : ''}}>Обработано</option>
                </select>
            </div>

            <div class="form-group">
                <label>Комментарий</label>
                <textarea class="form-control" rows="3" name="comment">{{ $comment or '' }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Сохранить</button>

        </form>
    </div>


@endsection