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
                <div class="card-header">Редактирование параметров</div>
                <div class="card">
                    {{ Html::ul($errors->all()) }}
                    {{ Form::model($dimension, array('route' => array('dimension.update', $dimension->id),'files'=>true, 'method' => 'PUT')) }}

                    <div class="form-group">
                        {{ Form::label('height', 'Высота', ['class' => 'col-sm-2 col-form-label']) }}
                        <div class="col-sm-10">
                            {{ Form::text('height', isset($dimension->height) ? $dimension->height  : 'Высота', ['class' => 'form-control']) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('width', 'Ширина', ['class' => 'col-sm-2 col-form-label']) }}
                        <div class="col-sm-10">
                            {{ Form::text('width', isset($dimension->width) ? $dimension->width  : 'Ширина', ['class' => 'form-control']) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('depth', 'Глубина', ['class' => 'col-sm-2 col-form-label']) }}
                        <div class="col-sm-10">
                            {{ Form::text('depth', isset($dimension->depth) ? $dimension->depth  : 'Глубина', ['class' => 'form-control']) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('type_id', 'Тип двери') }}
                        {{ Form::select('type_id', $names, '', ['class' => 'form-control' ]) }}
                    </div>
                    {{ Form::submit('Сохранить', ['class' => 'btn btn-primary']) }}
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>

@endsection
