@extends('layouts.template')
@section('contents')
@can('permisos_index')
@php
$mostrarSololectura = true;
@endphp
                    <form class="form-inline mx-6 margin-10" action="" method="GET">
                        <div class="container text-center">
                            <div class="row">
                                <div class="col-6">
                                    <h2 class="mx-2">Administración de Permisos</h2>
                                </div>
                                <div class="col-5 d-flex align-items-center">
                                    <label for="nombre" class="mx-3">Nombre</label>
                                    <input type="text" name="nombre" class="form-control mx-3" id="nombreSearch">
                                    <button type="submit" class="btn btn-primary mx-3">Enviar</button>
                                </div>
                                <div class="col">
                                </div>
                            </div>
                        </div>
                    </form>

        @if ( session('mensaje') )
            <div class="alert alert-success">
                @foreach (session('mensaje') as $item)
                    {{ $item }} <br>
                @endforeach
            </div>
        @endif
        
<div class="table-responsive text-center">
                
                <table class="table table-sm table-bordered table-hover">
                    <caption>Listado de Permisos</caption>
                    <thead class="thead-light">
                        <tr>
                            <th scope="col"> Id </th>
                            <th scope="col"> Nombre </th>
                            <th scope="col"> Creado </th>
                            <th scope="col" colspan="2">
                                @can('permisos_create')
                                    {{-- <a href="/agregarPermission" class="btn btn-primary">Agregar</a> --}}
                                    <a href="/factoryPermissions" class="btn btn-primary">Factory</a>
                                @endcan
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($Permissions as $Permission)
                            <tr>
                                
                            <th scope="row"> {{$Permission->id}}</th>
                            <td>{{$Permission->name}}</td>
                            <td>{{$Permission->created_at}}</td>
                            <td>
                                @can('permisos_edit')
                                <a href="/modificarPermission/{{ $Permission->id }}" class="margenAbajo btn" title="Editar">
                                <img src="icons/314724_document_edit_icon.svg" alt="imagen de lapiz editor" height="20px" class="">
                                </a>
                                <a href="/agregarPermissionToRoles/{{ $Permission->id }}" class="margenAbajo btn" title="Agregar/Quitar a Rol">
                                <img src="icons/9161347_log_out_input_access_security_icon.svg" alt="imagen de Cambio de Roles" height="20px">
                                </a>
                                @endcan
                            </td>
                            
                            </tr>
                        @endforeach
                    </tbody>
                </table>
</div>
        {{ $Permissions->links() }}
@endcan
@include('sinPermiso')
@endsection