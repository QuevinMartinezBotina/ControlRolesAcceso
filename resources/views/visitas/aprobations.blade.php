@extends('layouts.app')

@section('title')
    Aprobaciones
@endsection

@section('content')
    <section class="section ">
        <div class="section-header">
            <h3 class="page__heading">Aprobaciones</h3>
        </div>
        <div class="section-body ">
            <div class="row ">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body shadow-lg">

                            {{-- Visitas por aprobar --}}
                            <div class="row p-3 border rounded my-2">
                                <div class="col-md-12">
                                    <h3 class="h4 ">
                                        <strong>
                                            Visitas por aprobar
                                        </strong>
                                    </h3>
                                </div>

                                <div class="col-md-12">
                                    @foreach ($visitas as $visita)
                                        @if ($visita->id_estado == null)
                                            <div
                                                class="col-md-3 border-right d-flex justify-content-center  avi-target-red  rounded p-3 m-2">
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
                                                        <h5 class="h5">
                                                            Area de Visita
                                                        </h5>
                                                    </div>
                                                    <div class="col-md-12 h6 d-flex justify-content-center avi-text-green">
                                                        <strong>
                                                            {{ $visita->area->nom_area }}
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
                                                        <div
                                                            class="col-md-12 h6 d-flex justify-content-center avi-text-green">
                                                            <strong>
                                                                {{ date('d-m-Y', strtotime($visita->fecha_visita)) }}
                                                            </strong>
                                                        </div>
                                                    @endif

                                                    <div class="col-md-12 h6 d-flex justify-content-center avi-text-green">
                                                        <div class="row d-flex justify-content-center">
                                                            <div class="col-md-6">
                                                                <button class="btn avi-boton-red text-white"
                                                                    type="submit">Denegar</button>
                                                            </div>
                                                            <form class="col-md-6"
                                                                action="{{ route('aprobaciones.aprobar', $visita->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('PATCH')

                                                                <button class="btn avi-boton-green text-white"
                                                                    type="submit">Aprobar</button>
                                                            </form>
                                                        </div>

                                                    </div>

                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>

                            {{-- Visitas aprobadas --}}
                            <div class="row p-3 border rounded my-2">
                                <div class="col-md-12">
                                    <h3 class="h4 ">
                                        <strong>
                                            Visitas aprobadas
                                        </strong>
                                    </h3>
                                </div>

                                <div class="col-md-12">
                                    @foreach ($visitas as $visita)
                                        @if ($visita->id_estado)
                                            <div
                                                class="col-md-3 border-right d-flex justify-content-center  avi-target-green  rounded p-3 m-2">
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
                                                        <h5 class="h5">
                                                            Area de Visita
                                                        </h5>
                                                    </div>
                                                    <div class="col-md-12 h6 d-flex justify-content-center avi-text-green">
                                                        <strong>
                                                            {{ $visita->area->nom_area }}
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
                                                        <div
                                                            class="col-md-12 h6 d-flex justify-content-center avi-text-green">
                                                            <strong>
                                                                {{ date('d-m-Y', strtotime($visita->fecha_visita)) }}
                                                            </strong>
                                                        </div>
                                                    @endif

                                                    <div class="col-md-12 h6 d-flex justify-content-center avi-text-green">
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


                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
