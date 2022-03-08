@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Editar Rol</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            @if ($errors->any())
                                <div class="alert alert-dark alert-dismissible fade show" role="alert">
                                    <strong>¡Revise los campos!</strong>
                                    @foreach ($errors->all() as $error)
                                        <span class="badge badge-danger">{{ $error }}</span>
                                    @endforeach
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            @can('editar-rol')
                                {!! Form::model($role, ['method' => 'PATCH', 'route' => ['roles.update', $role->id]]) !!}
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="">Nombre del Rol:</label>
                                            {!! Form::text('name', null, ['class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="">Permisos para este Rol:</label>
                                            <br />
                                            <div class="row d-flex justify-content-center">

                                                {{-- Ver --}}
                                                <div class="col-md-3  border p-4 m-1">
                                                    <h3 class="h6"> <strong>Permisos de visualización</strong> </h3>
                                                    @foreach ($permission as $value)
                                                        @if (substr($value->name, 0, 3) == 'ver')
                                                            <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, ['class' => 'name']) }}
                                                                {{ $value->name }}</label>
                                                            <br />
                                                        @endif
                                                    @endforeach
                                                </div>

                                                {{-- crear --}}
                                                <div class="col-md-3  border p-4 m-1">
                                                    <h3 class="h6"> <strong>Permisos de Creación</strong> </h3>
                                                    @foreach ($permission as $value)
                                                        @if (substr($value->name, 0, 5) == 'crear')
                                                            <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, ['class' => 'name']) }}
                                                                {{ $value->name }}</label>
                                                            <br />
                                                        @endif
                                                    @endforeach
                                                </div>

                                                {{-- editar --}}
                                                <div class="col-md-3  border p-4 m-1">
                                                    <h3 class="h6"> <strong>Permisos de Edición</strong> </h3>
                                                    @foreach ($permission as $value)
                                                        @if (substr($value->name, 0, 6) == 'editar')
                                                            <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, ['class' => 'name']) }}
                                                                {{ $value->name }}</label>
                                                            <br />
                                                        @endif
                                                    @endforeach
                                                </div>

                                                {{-- borrar --}}
                                                <div class="col-md-3  border p-4 m-1">
                                                    <h3 class="h6"> <strong>Permisos de Eliminación</strong> </h3>
                                                    @foreach ($permission as $value)
                                                        @if (substr($value->name, 0, 6) == 'borrar')
                                                            <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, ['class' => 'name']) }}
                                                                {{ $value->name }}</label>
                                                            <br />
                                                        @endif
                                                    @endforeach
                                                </div>
                                                {{-- correos --}}
                                                <div class="col-md-3  border p-4 m-1">
                                                    <h3 class="h6"> <strong>Permisos de aprobaciones</strong> </h3>
                                                    @foreach ($permission as $value)
                                                        @if (substr($value->name, 0, 10) == 'aprobacion')
                                                            <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, ['class' => 'name']) }}
                                                                {{ $value->name }}</label>
                                                            <br />
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </div>

                                            {{-- @foreach ($permission as $value)
                                                <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, ['class' => 'name']) }}
                                                    {{ $value->name }}</label>
                                                <br />
                                            @endforeach --}}
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-success m-1">Guardar</button>
                                    <a class="btn btn-primary m-1" href="{{ route('roles.index') }}">Volver</a>

                                </div>
                                {!! Form::close() !!}
                            @endcan

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
