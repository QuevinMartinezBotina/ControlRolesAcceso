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
                                <div
                                    class="col-md-4 border-right d-flex justify-content-center  avi-target-green  rounded p-3 m-2">
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
                                            <i
                                                class="fas fa-phone avi-bg-red circle p-2 text-white rounded-circle avi-icon-info"></i>
                                            {{ $visita->telefono }}
                                        </div>
                                        <div class="col-md-5 h6 m-1 p-1">
                                            <i
                                                class="fas fa-envelope avi-bg-red circle p-2 text-white rounded-circle avi-icon-info"></i>
                                            {{ $visita->correo }}
                                        </div>
                                        <div class="col-md-5 h6 m-1 p-1">
                                            <i
                                                class="fas fa-building avi-bg-red circle p-2 text-white rounded-circle avi-icon-info"></i>
                                            {{ $visita->nom_empresa }}
                                        </div>
                                        <div class="col-md-5 h6 m-1 p-1">
                                            <i
                                                class="fas fa-medkit avi-bg-red circle p-2 text-white rounded-circle avi-icon-info"></i>
                                            {{ $visita->arl_empresa }}
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
                                            <i
                                                class="fas fa-hotel avi-bg-green circle p-2 text-white rounded-circle avi-icon-info "></i>
                                            {{ $visita->sede->nombre_sede }}
                                        </div>

                                        <div class="col-md-5 h6 m-1 p-1">
                                            <i
                                                class="fas fa-warehouse avi-bg-green circle p-2 text-white rounded-circle avi-icon-info"></i>
                                            {{ $visita->area->nom_area }}
                                        </div>

                                        <div class="col-md-5 h6 m-1 p-1">
                                            <i
                                                class="fas fa-bell avi-bg-green circle p-2 text-white rounded-circle avi-icon-info"></i>
                                            {{ $visita->motivo_visita }}
                                        </div>

                                        <div class="col-md-5 h6 m-1 p-1">
                                            <i
                                                class="fas fa-exclamation-circle avi-bg-green circle p-2 text-white rounded-circle avi-icon-info"></i>
                                            {{ $visita->observaciones }}
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
                                                <i
                                                    class="fas fa-hotel avi-bg-yellow circle p-2 text-white rounded-circle avi-icon-info"></i>
                                                {{ $visita->tipo }}
                                            </div>

                                            <div class="col-md-4 h6 m-1 p-1">
                                                <i
                                                    class="fas fa-warehouse avi-bg-yellow circle p-2 text-white rounded-circle avi-icon-info"></i>
                                                {{ $visita->placa }}
                                            </div>

                                            <div class="col-md-3 h6 m-1 p-1">
                                                <i
                                                    class="fas fa-bell avi-bg-yellow circle p-2 text-white rounded-circle avi-icon-info"></i>
                                                {{ $visita->color }}
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <a class="btn btn-primary" href="{{ route('visitas.index') }}">Volver</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
