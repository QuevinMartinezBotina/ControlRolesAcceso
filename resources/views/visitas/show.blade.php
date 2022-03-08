@extends('layouts.app')

@section('title')
    Detalles Visita
@endsection

@section('content')
    <section class="section ">
        <div class="section-header">
            <h3 class="page__heading">Detalles Visita</h3>
        </div>
        <div class="section-body ">
            <div class="row ">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body shadow-lg">

                            <div class="row">

                                <div class="col-12">
                                    @if ($message = Session::get('success'))
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <strong>{{ $message }}</strong>
                                            <button type="button" class="close" data-dismiss="alert"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    @endif
                                </div>

                                <div class="col-md-4 border-right d-flex   avi-target-green  rounded p-3 m-2">
                                    <div class="row">
                                        <div class="col-md-12 h3 d-flex justify-content-center">
                                            <strong class="text-center">
                                                {{ $visita->nom_visitante }}
                                            </strong>
                                        </div>
                                        <div class="col-md-12 h5 d-flex justify-content-center">
                                            <i class="far fa-user avi-icon-xl"></i>
                                        </div>
                                        <div class="col-md-12 h5 d-flex justify-content-center">
                                            {{ $visita->documento->tipo }}
                                        </div>
                                        <div class="col-md-12 h6 d-flex justify-content-center avi-text-green">
                                            <strong>
                                                {{ $visita->num_documento }}
                                            </strong>
                                        </div>

                                        <div class="col-md-12 h5 d-flex justify-content-center">
                                            Fecha programada
                                        </div>
                                        <div class="col-md-12 h6 d-flex justify-content-center avi-text-green">
                                            <strong>
                                                {{ date('d-m-Y', strtotime($visita->fecha_programada)) }}
                                            </strong>
                                        </div>

                                        {{-- @if (date('d-m-Y', strtotime($visita->fecha_visita)) >= '01-01-2022') --}}
                                        @if (isset($visita->fecha_visita))
                                            <div class="col-md-12 h5 d-flex justify-content-center">
                                                Fecha Visita Instalaciones
                                            </div>
                                            <div class="col-md-12 h6 d-flex justify-content-center avi-text-green">
                                                <strong>
                                                    {{ date('d-m-Y', strtotime($visita->fecha_visita)) }}
                                                </strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <div
                                    class="col-md-7 border-bottom border-dark  p-3 m-2 avi-target-orange rounded d-flex justify-content-center">
                                    <div class="row d-flex justify-content-center">
                                        <div class="col-md-12 h3 d-flex justify-content-center">
                                            <strong class="text-center">
                                                Información Visitante
                                            </strong>
                                        </div>
                                        <div class="col-md-5 h6 m-1 p-1">
                                            <div class="row">
                                                <div class="col-12">
                                                    <strong>
                                                        <i
                                                            class="fas fa-phone avi-bg-red circle p-2 text-white rounded-circle avi-icon-info"></i>
                                                        Teléfono
                                                    </strong>
                                                </div>
                                                <div class=" ml-5 p-1 col-12">
                                                    {{ $visita->telefono }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-5 h6 m-1 p-1">
                                            <div class="row">
                                                <div class="col-12">
                                                    <strong>
                                                        <i
                                                            class="fas fa-envelope avi-bg-red circle p-2 text-white rounded-circle avi-icon-info"></i>
                                                        Correo
                                                    </strong>
                                                </div>
                                                <div class=" ml-5 p-1 col-12">
                                                    {{ $visita->correo }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-5 h6 m-1 p-1">
                                            <div class="row">
                                                <div class="col-12">
                                                    <strong>
                                                        <i
                                                            class="fas fa-building avi-bg-red circle p-2 text-white rounded-circle avi-icon-info"></i>
                                                        Empresa Visitante
                                                    </strong>
                                                </div>
                                                <div class=" ml-5 p-1 col-12">
                                                    {{ $visita->nom_empresa }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-5 h6 m-1 p-1">
                                            <div class="row">
                                                <div class="col-12">
                                                    <strong>
                                                        <i
                                                            class="fas fa-medkit avi-bg-red circle p-2 text-white rounded-circle avi-icon-info"></i>
                                                        ARL
                                                    </strong>
                                                </div>
                                                <div class=" ml-5 p-1 col-12">
                                                    {{ $visita->arl_empresa }}
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Separador --}}
                                        <div class="col-md-12 border-bottom m-1 p-1">
                                        </div>
                                        {{-- Fin separador --}}
                                        <div class="col-md-12 h3 d-flex justify-content-center">
                                            <strong class="text-center">
                                                Información de la Visita
                                            </strong>
                                        </div>
                                        <div class="col-md-5 h6 m-1 p-1 ">
                                            <div class="row">
                                                <div class="col-12">
                                                    <strong>
                                                        <i
                                                            class="fas fa-hotel avi-bg-green circle p-2 text-white rounded-circle avi-icon-info "></i>
                                                        Sede de visita
                                                    </strong>
                                                </div>
                                                <div class=" ml-5 p-1 col-12">
                                                    {{ $visita->sede->nombre_sede }}
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-5 h6 m-1 p-1">
                                            <div class="row">
                                                <div class="col-12">
                                                    <strong>
                                                        <i
                                                            class="fas fa-warehouse avi-bg-green circle p-2 text-white rounded-circle avi-icon-info"></i>
                                                        Area de visita
                                                    </strong>
                                                </div>
                                                <div class=" ml-5 p-1 col-12">
                                                    {{ $visita->area->nom_area }}
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-5 h6 m-1 p-1">
                                            <div class="row">
                                                <div class="col-12">
                                                    <strong>
                                                        <i
                                                            class="fas fa-bell avi-bg-green circle p-2 text-white rounded-circle avi-icon-info"></i>
                                                        Motivo de visita
                                                    </strong>
                                                </div>
                                                <div class=" ml-5 p-1 col-10">
                                                    {{ $visita->motivo_visita }}
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-5 h6 m-1 p-1">
                                            <div class="row">
                                                <div class="col-12">
                                                    <strong>
                                                        <i
                                                            class="fas fa-exclamation-circle avi-bg-green circle p-2 text-white rounded-circle avi-icon-info"></i>
                                                        Observaciones
                                                    </strong>
                                                </div>
                                                <div class=" ml-5 p-1 col-10">
                                                    {{ $visita->observaciones }}
                                                </div>
                                            </div>

                                        </div>

                                        @if (isset($visita->tipo))
                                            {{-- Separador --}}
                                            <div class="col-md-12 border-bottom m-1 p-1">
                                            </div>
                                            {{-- Fin separador --}}

                                            <div class="col-md-12 h3 d-flex justify-content-center">
                                                <strong class="text-center">
                                                    Información de Vehículo
                                                </strong>
                                            </div>
                                            <div class="col-md-4 h6 m-1 p-1">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <strong>
                                                            <i
                                                                class="fas fa-hotel avi-bg-yellow circle p-2 text-white rounded-circle avi-icon-info"></i>
                                                            Tipo de vehículo
                                                        </strong>
                                                    </div>
                                                    <div class=" ml-5 p-1 col-10">
                                                        {{ $visita->tipo }}
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4 h6 m-1 p-1">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <strong>
                                                            <i
                                                                class="fas fa-warehouse avi-bg-yellow circle p-2 text-white rounded-circle avi-icon-info"></i>
                                                            Placa del vehículo
                                                        </strong>
                                                    </div>
                                                    <div class=" ml-5 p-1 col-10">
                                                        {{ $visita->placa }}

                                                    </div>
                                                </div>

                                            </div>

                                            <div class="col-md-3 h6 m-1 p-1">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <strong>
                                                            <i
                                                                class="fas fa-bell avi-bg-yellow circle p-2 text-white rounded-circle avi-icon-info"></i>
                                                            Color
                                                        </strong>
                                                    </div>
                                                    <div class=" ml-5 p-1 col-10">
                                                        {{ $visita->color }}
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-12 d-flex justify-content-start">
                                    <div class="row d-flex justify-content-start">

                                        @can('aprobacion-volver')
                                            <div class="col-3 m-1">
                                                <a class="btn btn-primary" href="{{ route('visitas.index') }}">Volver</a>
                                            </div>
                                        @endcan

                                        @can('aprobacion-aprobar')
                                            <div class="col-3 m-1">
                                                <form class=""
                                                    action="{{ route('aprobaciones.aprobar', $visita->id) }}" method="POST">
                                                    @csrf
                                                    @method('PATCH')

                                                    <button class="btn avi-boton-green text-white"
                                                        type="submit">Aprobar</button>
                                                </form>
                                            </div>
                                        @endcan

                                        @can('aprobacion-denegar')
                                            <div class="col-3 m-1">
                                                <form action="{{ route('aprobaciones.denegar', $visita->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <div class="">
                                                        <button class="btn avi-boton-red text-white "
                                                            type="submit">Denegar</button>
                                                    </div>
                                                </form>
                                            </div>
                                        @endcan
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
