@extends('layouts.app')

@section('content')

    @include('layouts.admin.message')

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Меню</div>
                    <div class="card-body">
                        @include('layouts.admin.menu')
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Параметры <a href="{{ route('dimension.create') }}"
                                                             class="badge badge-success"><h5>Добавить</h5></a></div>
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Высота</th>
                            <th scope="col">Ширина</th>
                            <th scope="col">Глубина</th>
                            <th scope="col">Тип двери</th>
                            <th scope="col">Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($dimensions as $dimension)
                            <tr>
                                <th scope="row">{{ $dimension->id }}</th>
                                <td>{{ $dimension->height }}</td>
                                <td>{{ $dimension->width }}</td>
                                <td>{{ $dimension->depth }}</td>
                                <td>{{ $dimension->type->title }}</td>
                                <td>
                                    <a href="{{ route('dimension.edit',$dimension->id) }}" class="badge badge-primary">Редактировать</a>
                                    {{ Form::open(['method' => 'DELETE', 'route' => ['dimension.destroy', $dimension->id], 'data-confirm' => 'Are you sure you want to delete?', 'style' => 'display:inline-block' ])}}
                                    {{ Form::button("Удалить", ['type' => 'submit', 'class' => 'btn btn-danger']) }}
                                    {{ Form::close() }}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $dimensions->links() }}
                </div>
            </div>
        </div>
    </div>

@endsection
