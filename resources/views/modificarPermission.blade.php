@extends('layouts.template')
@section('contents')
@can('permisos_edit')
@php
$mostrarSololectura = true;
@endphp
<h3>Modificando Permiso con ID: {{ $elemento->id }}</h3>
    <div class="alert bg-body-tertiary border col-8 mx-auto p-4">
    <form action="/modificarPermission" method="post">
        @csrf
        @method('patch')

        
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="name">Nombre: </label>
                <input type="text" name="name" value="{{$elemento->name}}" maxlength="255"  class="form-control">
            </div>
        </div>
            <input type="hidden" name="id" value="{{$elemento->id}}">
            <button type="submit" class="btn btn-primary" id="enviar">Modificar</button>
            <a href="/adminPermissions" class="btn btn-primary">volver</a>
    </form>
    </div>

    @if( $errors->any() )
        <div class="alert alert-danger col-8 mx-auto">
            <ul>
                @foreach( $errors->all() as $error )
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@endcan
@include('sinPermiso')
@endsection