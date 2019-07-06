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
                <div class="card-header">Добавление цвета</div>
                <div class="card">
                    {{ Html::ul($errors->all()) }}

                    {{ Form::model($color, array('route' => array('color.update', $color->id),'files'=>true, 'method' => 'PUT')) }}
                    <div class="form-group">
                        {{ Form::label('configuration_id', 'Конфигурация') }}
                        {{ Form::select('configuration_id', $names, '', ['class' => 'form-control' ]) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('type', 'Тип') }}
                        {{Form::select('type', array(
                            'body_color' => 'Цвет корпуса',
                            'profile_color' => 'Цвет профиля')
                        ,''
                        ,['class' => 'form-control']
                        )}}
                    </div>
                    <div class="form-group">
                        {{ Form::label('title', 'Название', ['class' => 'col-sm-2 col-form-label']) }}
                        {{ Form::text('title', isset($color->title) ? $color->title  : 'Заголовок', ['class' => 'form-control']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('price', 'Цена', ['class' => 'col-sm-2 col-form-label']) }}
                        {{ Form::text('price', isset($color->price) ? $color->price  : '0', ['class' => 'form-control']) }}
                    </div>
                        <div class="form-group">
                            <div class="col-sm-10">
                                <img src="{{ $color->getFirstMediaUrl('posters', 'thumb') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-10">
                                {{ Form::label('title', 'Загрузить изображение', ['class' => 'custom-file-label']) }}
                                {!! Form::file('image', ['class' => 'custom-file-input']) !!}
                            </div>
                        </div>
                    {{ Form::submit('Сохранить', ['class' => 'btn btn-primary']) }}
                    {{ Form::close() }}
                </div>
            </div>
        </div>

@endsection
