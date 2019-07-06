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
                <div class="card-header">Редактирование типа двери</div>
                <div class="card">
                    {{ Html::ul($errors->all()) }}
                    {{ Form::model($slidingdoors, array('route' => array('slidingdoors.update', $slidingdoors->id),'files'=>true, 'method' => 'PUT')) }}
                    <div class="form-group">
                        {{ Form::label('title', 'Название', ['class' => 'col-sm-2 col-form-label']) }}
                        <div class="col-sm-10">
                            {{ Form::text('title', isset($slidingdoors->title) ? $slidingdoors->title  : 'Заголовок', ['class' => 'form-control']) }}

                        </div>
                    </div>
                    {{ Form::submit('Сохранить', ['class' => 'btn btn-primary']) }}
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>

@endsection
