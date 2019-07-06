@extends('layouts.app')

@section('content')
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
                <div class="card-header">Редактирование фасада</div>
                <div class="card">
                    {{ Html::ul($errors->all()) }}
                    {{ Form::model($facade, array('route' => array('facade.update', $facade->id),'files'=>true, 'method' => 'PUT')) }}
                    <div class="form-group">
                        {{ Form::label('configuration_id', 'Конфигурация') }}
                        {{ Form::select('configuration_id', $names, '', ['class' => 'form-control' ]) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('type', 'Тип') }}
                        {{Form::select('type', array(
                            'facade_selection' => 'Выбор фасада',
                            'additional_components' => 'Дополнительные компоненты')
                        ,''
                        ,['class' => 'form-control']
                        )}}
                    </div>
                    <div class="form-group">
                        {{ Form::label('title', 'Название', ['class' => 'col-sm-2 col-form-label']) }}
                        {{ Form::text('title', isset($facade->title) ? $facade->title  : 'Заголовок', ['class' => 'form-control']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('price', 'Цена', ['class' => 'col-sm-2 col-form-label']) }}
                        {{ Form::text('price', isset($facade->price) ? $facade->price  : 'Заголовок', ['class' => 'form-control']) }}
                    </div>
                    {{ Form::submit('Сохранить', ['class' => 'btn btn-primary']) }}
                    {{ Form::close() }}
                </div>
            </div>
        </div>

@endsection
