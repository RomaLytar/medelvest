@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">Меню</div>
                    <div class="card-body">
                        @include('layouts.admin.menu')
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Фасады <a href="{{ route('facade.create') }}" class="badge badge-success"><h4>
                                Добавить</h4></a></div>
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Название</th>
                            <th scope="col">Тип</th>
                            <th scope="col">Цена</th>
                            <th scope="col">Тип цвета</th>
                            <th scope="col">Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($facades as $facade)
                            <tr>
                                <th scope="row">{{ $facade->id }}</th>
                                <td>{{ $facade->title }}</td>
                                <td>
                                    {{($facade->type == 'facade_selection') ? 'Выбор фасада' : 'Доп-комплектации'}}
                                </td>
                                <td>{{ $facade->price }}</td>
                                <td>{{ $facade->configuration->title }}</td>
                                <td>
                                    <a href="{{ route('facade.edit',$facade->id) }}" class="badge badge-primary">Редактировать</a>
                                    {{ Form::open(['method' => 'DELETE', 'route' => ['facade.destroy', $facade->id], 'data-confirm' => 'Are you sure you want to delete?', 'style' => 'display:inline-block' ])}}
                                    {{ Form::button("Удалить", ['type' => 'submit', 'class' => 'btn btn-danger']) }}
                                    {{ Form::close() }}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $facades->links() }}
                </div>
            </div>
        </div>
    </div>

@endsection
