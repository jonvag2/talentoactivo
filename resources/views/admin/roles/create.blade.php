@extends('adminlte::page')
@section('title', 'Sanar')

@section('content_header')
    <h1>Crear rol</h1>
@stop

@section('content')
    <div class="container mx-auto">
        <div class="card">
            <div class="card-body">
                {!! Form::open(['route' => 'admin.roles.store']) !!}

                    @include('admin.roles.partials.form')

                    {!! Form::submit('Crear Rol', ['class' => 'btn btn-primary']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop