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
                    <div class="card-header">Тип двери <a href="{{ route('slidingdoors.create') }}"
                                                          class="badge badge-success"><h5>Добавить</h5></a></div>
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Заголовок</th>
                            <th scope="col">Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($slidingdoors as $slidingdoor)
                            <tr>
                                <th scope="row">{{ $slidingdoor->id }}</th>
                                <td>{{ $slidingdoor->title }}</td>
                                <td>
                                    <a href="{{ route('slidingdoors.edit',$slidingdoor->id) }}" class="badge badge-primary">Редактировать</a>
                                    {{ Form::open(['method' => 'DELETE', 'route' => ['slidingdoors.destroy', $slidingdoor->id], 'data-confirm' => 'Are you sure you want to delete?', 'style' => 'display:inline-block' ])}}
                                    {{ Form::button("Удалить", ['type' => 'submit', 'class' => 'btn btn-danger']) }}
                                    {{ Form::close() }}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $slidingdoors->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
