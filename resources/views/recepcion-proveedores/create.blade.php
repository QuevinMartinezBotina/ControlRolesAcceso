@extends('layouts.app')

@section('title')
    Crear Visita
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Crear Visita</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            @if ($message = Session::get('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>{{ $message }}</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

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

                            @can('crear-recepcion-proveedor')
                                <form action="{{ route('recepcion-proveedores.store') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            {{-- Datos pro si entra a pie --}}
                                            <div class="row border-bottom">

                                                <h4 class="h4 col-12 p-2">En caso de ingreso a pie</h4>
                                                <div class="col-xs-12 col-sm-12 col-md-5">
                                                    <div class="form-group">
                                                        <label for="nom_visitante">Nombre del Visitante</label>
                                                        <input type="text" name="nom_visitante" class="form-control"
                                                            value="{{ old('nom_visitante') }}">
                                                    </div>
                                                </div>

                                                <div class="col-xs-3 col-sm-12 col-md-3">
                                                    <div class="form-group">
                                                        <label for="id_documento">Tipo de Documento</label>
                                                        <select name="id_documento" class="form-select form-control"
                                                            value="{{ old('id_documento') }}">
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
                                                        <input type="number" name="num_documento" class="form-control"
                                                            value="{{ old('num_documento') }}">
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- Datos pro si entra en vehiculo --}}
                                            <div class="row border-bottom my-3">

                                                <h4 class="h4 col-12 p-2">En caso de ingreso en vehículo</h4>

                                                <div class="col-xs-12 col-sm-12 col-md-3">
                                                    <div class="form-group">
                                                        <label for="tipo">Tipo de vehículo</label>
                                                        <input type="text" name="tipo" class="form-control"
                                                            value="{{ old('tipo') }}">
                                                    </div>
                                                </div>

                                                <div class="col-xs-12 col-sm-12 col-md-3">
                                                    <div class="form-group">
                                                        <label for="num_placa">Número de placa</label>
                                                        <input type="text" name="num_placa" class="form-control"
                                                            value="{{ old('num_placa') }}">
                                                    </div>
                                                </div>

                                                <div class="col-xs-3 col-sm-12 col-md-3">
                                                    <div class="form-group">
                                                        <label for="color">Color</label>
                                                        <input type="text" name="color" class="form-control"
                                                            value="{{ old('color') }}">
                                                    </div>
                                                </div>

                                                <div class="col-xs-3 col-sm-12 col-md-3">
                                                    <div class="form-group">
                                                        <label for="num_personas">Número de personas</label>
                                                        <input type="number" name="num_personas" class="form-control"
                                                            value="{{ old('num_personas') }}">
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- Campo para observaciones generales --}}
                                            <div class="row border-bottom my-3">

                                                <h4 class="h4 col-12 p-2">Campo para observaciones generales</h4>

                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                    <div class="form-group">
                                                        <label for="observaciones">Observaciones generales</label>
                                                        <textarea class="w-100 p-2" name="observaciones" id="" rows="5">{{ old('observaciones') }}</textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xs-12 col-sm-12 col-md-12">

                                                <button type="submit" class="btn btn-success m-1 ">Guardar</button>

                                                @can('ver-recepcion-proveedor')
                                                    <a class="btn btn-primary m-1"
                                                        href="{{ route('recepcion-proveedores.index') }}">Volver</a>
                                                @endcan

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
