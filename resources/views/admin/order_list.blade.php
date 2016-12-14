@extends('admin/layout')

@section('title', 'Заказы')

@section('main')

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <table data-toggle="table" data-url="{{ route('order_json') }}"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="created_at" data-sort-order="desc">
                        <thead>
                        <tr>
                            <th data-field="state" data-checkbox="true" >Item ID</th>
                            <th data-field="id" data-sortable="true">ID</th>
                            <th data-field="name"  data-sortable="true">Имя</th>
                            <th data-field="phone" data-sortable="true">Телефон</th>
                            <th data-field="email" data-sortable="true">Email</th>
                            <th data-field="files" data-sortable="true">Файлы</th>
                            <th data-field="status" data-sortable="true">Статус</th>
                            <th data-field="created_at" data-sortable="true">Дата</th>
                            <th data-formatter="actionFormatter" data-sortable="true">Операции</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div><!--/.row-->

@endsection

@section('script')
    @parent

    <script>
        function actionFormatter(value, row) {

            var res = '<a href="{{  url('admin/order/update') }}/' + row.id + '" style="margin-right: 4px"><svg class="glyph stroked pencil action_svg"><use xlink:href="#stroked-pencil"/></svg></a>';

            res += '<a href="{{  url('admin/order/remove') }}/' + row.id + '"><svg class="glyph stroked basket action_svg"><use xlink:href="#stroked-basket"/></svg></a>';

            return res;
        }
    </script>

@endsection