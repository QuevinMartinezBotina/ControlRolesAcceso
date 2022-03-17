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
                                <form method="POST" action="{{ route('recepcion-visitas.store') }}">
                                    @csrf
                                    <div class="row">

                                        <div class="col-xs-12 col-sm-12 col-md-6 d-none ">
                                            <div class="form-group">
                                                <label for="id_visita">id visitante</label>
                                                <input type="number" name="id_visita" id="" value="{{ $visita->id }}">
                                            </div>
                                        </div>

                                        <div class="col-xs-12 col-sm-12 col-md-6  ">
                                            <div class="form-group">
                                                <label for="id_carnet">Carnet que se asigna</label>
                                                <select class="form-control" name="id_carnet"
                                                    value="{{ old('id_estado') }}">
                                                    @foreach ($carnets as $carnet)
                                                        @if ($carnet->estado->nom_estado == 'Carnet Disponible')
                                                            <option style="background: ; " value="{{ $carnet->id }}">
                                                                {{ $carnet->numero }}
                                                                <span class="text-info"></span>
                                                            </option>
                                                        @endif
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-xs-12 col-sm-12 col-md-6">
                                            <div class="form-group">
                                                <label for="id_estado">Estado del visitante en las intalaciones</label>
                                                <select class="form-control" name="id_estado"
                                                    value="{{ old('id_estado') }}">
                                                    @foreach ($estados as $estado)
                                                        @if ($estado->modulo == 'recepcion')
                                                            <option style="background: ; " value="{{ $estado->id }}">
                                                                {{ $estado->nom_estado }}
                                                                <span class="text-info"></span>
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>



                                        <div class="col-xs-12 col-sm-12 col-md-6">
                                            <div class="form-group">
                                                <label for="observaciones">Observaciones del visitante</label>
                                                <textarea class="w-100 p-2" name="observaciones" id="" rows="5"
                                                    placeholder="Ingrese en este campo detalles sobre el visitante"></textarea>
                                            </div>
                                        </div>

                                        <div class="col-xs-12 col-sm-12 col-md-6">
                                            <div class="form-group">
                                                <label for="observaciones_equipos">Observaciones de equipos</label>
                                                <textarea class="w-100 p-2" name="observaciones_equipos" id="" rows="5"
                                                    placeholder="Ingrese en este campo detalles sobre los equipos"></textarea>
                                            </div>
                                        </div>

                                        <div class="col-xs-3 col-sm-12 col-md-12  py-3 text-muted">
                                            <h3 class="h4">
                                                Este apartado es en caso de algun equipo, indicando detalles y si ingresa a las
                                                instalaciones o queda en portería.
                                            </h3>
                                        </div>

                                        <div class="col-xs-3 col-sm-12 col-md-4">
                                            <div class="form-group">
                                                <label for="marca">Marca</label>
                                                <input type="text" name="marca" class="form-control">

                                            </div>
                                        </div>

                                        <div class="col-xs-3 col-sm-12 col-md-4">
                                            <div class="form-group">
                                                <label for="serial">Seríal</label>
                                                <input type="text" name="serial" class="form-control">

                                            </div>
                                        </div>

                                        <div class="col-xs-3 col-sm-12 col-md-4">
                                            <div class="form-group">
                                                <label for="color">¿Quedo en portería o ingreso a planta?</label>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="planta_porteria"
                                                        id="quedoEnPorteria" checked value="porteria">
                                                    <label class="form-check-label" for="quedoEnPorteria">
                                                        Quedo en portería
                                                    </label>

                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="planta_porteria"
                                                        id="ingresoEnIntalaciones" value="instalaciones">
                                                    <label class="form-check-label" for="ingresoEnIntalaciones">
                                                        Ingreso a las instalaciones
                                                    </label>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="col-xs-12 col-sm-12 col-md-12">

                                            <button type="submit" class="btn btn-success m-1 ">Guardar</button>
                                            <a class="btn btn-primary m-1"
                                                href="{{ route('recepcion-visitas.index') }}">Volver</a>

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
