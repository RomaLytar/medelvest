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
                    <div class="card-header">Цветовой профиль <a href="{{ route('color.create') }}" class="badge badge-success"><h4>Добавить</h4></a></div>
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Название</th>
                            <th scope="col">Тип</th>
                            <th scope="col">Тип цвета</th>
                            <th scope="col">Цена</th>
                            <th scope="col">Изображение</th>
                            <th scope="col">Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($colors as $color)
                            <tr>
                                <th scope="row">{{ $color->id }}</th>
                                <td style="width: 25%">{{ $color->title }}</td>
                                <td>
                                    {{($color->type == 'body_color') ? 'Цвет корпуса' : 'Цвет профиля'}}
                                </td>
                                <td>{{ $color->configuration->title }}</td>
                                <td>{{ $color->price }}</td>
                                <td><img src="{{ $color->getFirstMediaUrl('posters', 'thumb') }}"></td>
                                <td>
                                    <a href="{{ route('color.edit',$color->id) }}" class="badge badge-primary">Редактировать</a>
                                    {{ Form::open(['method' => 'DELETE', 'route' => ['color.destroy', $color->id], 'data-confirm' => 'Are you sure you want to delete?', 'style' => 'display:inline-block' ])}}
                                    {{ Form::button("Удалить", ['type' => 'submit', 'class' => 'btn btn-danger']) }}
                                    {{ Form::close() }}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $colors->links() }}
                </div>
            </div>
        </div>
    </div>

@endsection
