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
                    <div class="card-header">Конфигурации <a href="{{ route('dashboard.create') }}"
                                                             class="badge badge-success"><h5>Добавить</h5></a></div>
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Название</th>
                            <th scope="col">Изображение</th>
                            <th scope="col">Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($configuration as $config)
                            <tr>
                                <th scope="row">{{ $config->id }}</th>
                                <td style="width: 30%">{{ $config->title }}</td>
                                <td><img src="{{ $config->getFirstMediaUrl('posters', 'thumb') }}"></td>
                                <td>
                                    <a href="{{ route('dashboard.edit',$config->id) }}" class="badge badge-primary">Редактировать</a>
                                    {{ Form::open(['method' => 'DELETE', 'route' => ['dashboard.destroy', $config->id], 'data-confirm' => 'Are you sure you want to delete?', 'style' => 'display:inline-block' ])}}
                                    {{ Form::button("Удалить", ['type' => 'submit', 'class' => 'btn btn-danger']) }}
                                    {{ Form::close() }}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $configuration->links() }}
                </div>
            </div>
        </div>
    </div>

@endsection
