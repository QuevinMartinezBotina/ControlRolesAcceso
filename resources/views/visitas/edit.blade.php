@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Editar visita</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            @if ($errors->any())
                                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                    <strong>¡Revise los campos! </strong>
                                    @foreach ($errors->all() as $error)
                                        <span class="badge badge-danger">{{ $error }}</span>
                                    @endforeach
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            @can('crear-visita')
                                <form action="{{ route('visitas.update', $visita->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <label for="nom_visitante">Nombre del Visitante</label>
                                                <input value="{{ $visita->nom_visitante }}" type="text" name="nom_visitante"
                                                    class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-xs-3 col-sm-12 col-md-4">
                                            <div class="form-group">
                                                <label for="id_documento">Tipo de Documento</label>
                                                <select name="id_documento" class="form-select form-control">
                                                    @foreach ($documentos as $documento)
                                                        <option class="" value="{{ $documento->id }}">
                                                            {{ $documento->tipo }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-xs-3 col-sm-12 col-md-4">
                                            <div class="form-group">
                                                <label for="num_documento">Número de Documento</label>
                                                <input value="{{ $visita->num_documento }}" type="number" name="num_documento"
                                                    class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-xs-3 col-sm-12 col-md-4">
                                            <div class="form-group">
                                                <label for="telefono">Teléfono</label>
                                                <input value="{{ $visita->telefono }}" type="number" name="telefono"
                                                    class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-xs-3 col-sm-12 col-md-4">
                                            <div class="form-group">
                                                <label for="correo">Correo</label>
                                                <input value="{{ $visita->correo }}" type="email" name="correo"
                                                    class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-xs-3 col-sm-12 col-md-4">
                                            <div class="form-group">
                                                <label for="nom_empresa">Nombre Empresa</label>
                                                <input value="{{ $visita->nom_empresa }}" type="text" name="nom_empresa"
                                                    class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-xs-3 col-sm-12 col-md-4">
                                            <div class="form-group">
                                                <label for="arl_empresa">ARL Empresa</label>
                                                <input value="{{ $visita->arl_empresa }}" type="text" name="arl_empresa"
                                                    class="form-control">

                                            </div>
                                        </div>

                                        <div class="col-xs-3 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <label for="id_area">Area de Visita</label>
                                                <select name="id_area" class="form-select form-control">
                                                    <option class="" value="{{ $visita->id_area }}">
                                                        {{ $visita->area->nom_area }} <span class="text-success"> - Area
                                                            Actual</span>
                                                    </option>
                                                    @foreach ($areas as $area)
                                                        <option class="" value="{{ $area->id }}">
                                                            {{ $area->nom_area }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-xs-12 col-sm-12 col-md-6">
                                            <div class="form-group">
                                                <label for="motivo_visita">Motivo de Visita</label>
                                                <textarea class="w-100" name="motivo_visita" id=""
                                                    rows="5">{{ $visita->motivo_visita }}</textarea>
                                            </div>
                                        </div>

                                        <div class="col-xs-12 col-sm-12 col-md-6">
                                            <div class="form-group">
                                                <label for="observaciones">Observaciones</label>
                                                <textarea class="w-100" name="observaciones" id=""
                                                    rows="5">{{ $visita->observaciones }}</textarea>
                                            </div>
                                        </div>

                                        <div class="col-xs-3 col-sm-12 col-md-4">
                                            <div class="form-group">
                                                <label for="id_sede">Sede a la que visita</label>
                                                <select name="id_sede" class="form-select form-control">
                                                    <option class="" value="{{ $visita->id_sede }}">
                                                        {{ $visita->sede->nombre_sede }} <span class="text-success"> - Sede
                                                            Actual</span>
                                                    </option>
                                                    @foreach ($sedes as $sede)
                                                        <option class="" value="{{ $sede->id }}">
                                                            {{ $sede->nombre_sede }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-xs-3 col-sm-12 col-md-4">
                                            <div class="form-group">
                                                <label for="fecha_programada">Fecha para la que se programa la visita</label>
                                                <input value="{{ date('Y-m-d', strtotime($visita->fecha_programada)) }}"
                                                    type="date" name="fecha_programada" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-xs-3 col-sm-12 col-md-4">
                                            <div class="form-group">
                                                <label for="fecha_visita">Fecha en la que se realizo la visita</label>
                                                <input value="{{ date('Y-m-d', strtotime($visita->fecha_visita)) }}"
                                                    type="date" name="fecha_visita" class="form-control">
                                                {{-- <p class="text-muted">No seleccione fecha, este campo se deja vacio hasta el
                                                    día de visita a las
                                                    instalaciones</p> --}}

                                            </div>
                                        </div>


                                        <div class="col-xs-3 col-sm-12 col-md-12  py-3 text-muted">
                                            <h3 class="h4">
                                                Este apartado es en caso de visitar las instalaciones con un vehículo
                                            </h3>
                                        </div>

                                        <div class="col-xs-3 col-sm-12 col-md-4">
                                            <div class="form-group">
                                                <label for="tipo">Tipo</label>
                                                <input value="{{ $visita->tipo }}" type="text" name="tipo"
                                                    class="form-control">

                                            </div>
                                        </div>

                                        <div class="col-xs-3 col-sm-12 col-md-4">
                                            <div class="form-group">
                                                <label for="placa">Placa del Vehículo</label>
                                                <input value="{{ $visita->placa }}" type="text" name="placa"
                                                    class="form-control">

                                            </div>
                                        </div>

                                        <div class="col-xs-3 col-sm-12 col-md-4">
                                            <div class="form-group">
                                                <label for="color">Color</label>
                                                <input value="{{ $visita->color }}" type="text" name="color"
                                                    class="form-control">

                                            </div>
                                        </div>

                                        <div class="col-xs-12 col-sm-12 col-md-12">

                                            <button type="submit" class="btn btn-success m-1 ">Guardar</button>
                                            <a class="btn btn-primary m-1" href="{{ route('visitas.index') }}">Volver</a>

                                        </div>
                                </form>
                            @endcan

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
