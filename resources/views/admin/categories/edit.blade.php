@extends('adminlte::page')

@section('title', 'titulo')

@section('content')
@if (session('info'))
        <div class="alert alert-success">
            {{session('info')}}
        </div>
@endif
    
    <div class="card">
        <div class="card-body">
            {!! Form::model($category, ['route'=>['admin.categories.update', $category], 'method'=>'put']) !!}
                <div class="form-group">
                    {!! Form::label('name', 'nombre') !!}
                    {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'ingrese el nombre de la categoria']) !!}
                    @error('name')
                        <span class="text-danger text-sm">{{$message}}</span>
                    @enderror
                </div>
            
                {!! Form::submit('actualizar categoria', ['class'=>'btn btn-primary']) !!}
                <a class="btn btn-primary ml-4" href="{{route('admin.categories.index')}}">volver</a>
            
                {!! Form::close() !!}
        </div>
    </div>
@stop

@section('content')

@stop
