@extends('layouts.app')
@section('title')
    Editar viista de proveedor
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Editar viista de proveedor</h3>
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

                            @can('editar-recepcion-proveedor')
                                <form action="{{ route('recepcion-proveedores.update', $recepcionProveedore->id) }}"
                                    method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12">

                                            {{-- Datos empresa transportadora o de venta --}}
                                            <div class="row border-bottom py-3">

                                                <h4 class="h4 col-12 p-2">Datos de empresa del proveedor</h4>
                                                <div class="col-xs-12 col-sm-12 col-md-6">
                                                    <div class="form-group">
                                                        <label for="empresa_transportadora">Nombre empresa
                                                            transportadora</label>
                                                        <input type="text" name="empresa_transportadora" class="form-control"
                                                            value="{{ $recepcionProveedore->empresa_transportadora }}">
                                                    </div>
                                                </div>

                                                <div class="col-xs-12 col-sm-12 col-md-6">
                                                    <div class="form-group">
                                                        <label for="empresa_vendedora">Nombre de empresa venderora</label>
                                                        <input type="text" name="empresa_vendedora" class="form-control"
                                                            value="{{ $recepcionProveedore->empresa_vendedora }}">
                                                    </div>
                                                </div>

                                            </div>

                                            {{-- Datos pro si entra a pie --}}
                                            <div class="row border-bottom py-3">

                                                <h4 class="h4 col-12 p-2">En caso de ingreso a pie</h4>
                                                <div class="col-xs-12 col-sm-12 col-md-5">
                                                    <div class="form-group">
                                                        <label for="nombre">Nombre del Visitante</label>
                                                        <input type="text" name="nombre" class="form-control"
                                                            value="{{ $recepcionProveedore->nombre }}">
                                                    </div>
                                                </div>

                                                <div class="col-xs-3 col-sm-12 col-md-3">
                                                    <div class="form-group">
                                                        <label for="id_documento">Tipo de Documento</label>
                                                        <select name="id_documento" class="form-select form-control"
                                                            value="{{ $recepcionProveedore->id_documento }}">
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
                                                            value="{{ $recepcionProveedore->num_documento }}">
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- Datos pro si entra en vehiculo --}}
                                            <div class="row border-bottom my-3 py-3">

                                                <h4 class="h4 col-12 p-2">En caso de ingreso en vehículo</h4>

                                                <div class="col-xs-12 col-sm-12 col-md-3">
                                                    <div class="form-group">
                                                        <label for="tipo">Tipo de vehículo</label>
                                                        <input type="text" name="tipo" class="form-control"
                                                            value="{{ $recepcionProveedore->tipo }}">
                                                    </div>
                                                </div>

                                                <div class="col-xs-12 col-sm-12 col-md-3">
                                                    <div class="form-group">
                                                        <label for="num_placa">Número de placa</label>
                                                        <input type="text" name="num_placa" class="form-control"
                                                            value="{{ $recepcionProveedore->num_placa }}">
                                                    </div>
                                                </div>

                                                <div class="col-xs-3 col-sm-12 col-md-3">
                                                    <div class="form-group">
                                                        <label for="color">Color</label>
                                                        <input type="text" name="color" class="form-control"
                                                            value="{{ $recepcionProveedore->color }}">
                                                    </div>
                                                </div>

                                                <div class="col-xs-3 col-sm-12 col-md-3">
                                                    <div class="form-group">
                                                        <label for="num_personas">Número de personas</label>
                                                        <input type="number" name="num_personas" class="form-control"
                                                            value="{{ $recepcionProveedore->num_personas }}">
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- Campo para observaciones generales --}}
                                            <div class="row border-bottom my-3">

                                                <h4 class="h4 col-12 p-2">Campo para observaciones generales</h4>

                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                    <div class="form-group">
                                                        <label for="observaciones">Observaciones generales</label>
                                                        <textarea class="w-100 p-2" name="observaciones" id=""
                                                            rows="5">{{ $recepcionProveedore->observaciones }}</textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xs-12 col-sm-12 col-md-12">

                                                <button type="submit" class="btn btn-success m-1 ">Guardar</button>

                                                <a class="btn btn-primary m-1"
                                                    href="{{ route('recepcion-proveedores.index') }}">Volver</a>

                                            </div>
                                        </div>
                                </form>
                            </div>
                        @endcan

                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
