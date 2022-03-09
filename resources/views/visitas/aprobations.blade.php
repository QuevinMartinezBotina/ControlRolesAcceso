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
                <div class="col-12">

                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ $message }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body shadow-lg">

                            @can('aprobacion-ver-por-aprobar')
                                {{-- Visitas por aprobar --}}
                                <div class="row p-3 border rounded my-2">
                                    <div class="col-md-12">
                                        <h3 class="h4 ">
                                            <strong>
                                                Visitas por aprobar
                                            </strong>
                                        </h3>
                                    </div>

                                    <div class="row col-md-12">
                                        @foreach ($visitas as $visita)
                                            @if ($visita->estado->nom_estado == 'Visita Por Aprobar')
                                                <div
                                                    class="col-md-3 border-right d-flex justify-content-center  avi-target-orange  rounded p-3 m-2">
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
                                                                @if ($visita->id_estado == null)
                                                                    <i>El estado es NUll</i>
                                                                @endif
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

                                                                @can('aprobacion-denegar')
                                                                    <div class="col-md-6">
                                                                        <form
                                                                            action="{{ route('aprobaciones.denegar', $visita->id) }}"
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

                                                                @can('aprobacion-aprobar')
                                                                    <form class="col-md-6"
                                                                        action="{{ route('aprobaciones.aprobar', $visita->id) }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        @method('PATCH')

                                                                        <button class="btn avi-boton-green text-white"
                                                                            type="submit">Aprobar</button>
                                                                    </form>
                                                                @endcan
                                                            </div>

                                                        </div>

                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            @endcan

                            @can('aprobacion-ver-aprobados')
                                {{-- Visitas aprobadas --}}
                                <div class="row p-3 border rounded my-2">
                                    <div class="col-md-12">
                                        <h3 class="h4 ">
                                            <strong>
                                                Visitas aprobadas
                                            </strong>
                                        </h3>
                                    </div>

                                    <div class="row col-md-12">
                                        @foreach ($visitas as $visita)
                                            @if ($visita->estado->nom_estado == 'Visita Aprobada')
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
                                                                {{ $visita->estado->nom_estado }}
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

                                                        @can('aprobacion-denegar')
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
                                                        @endcan


                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            @endcan

                            @can('aprobacion-ver-desaprobados')
                                {{-- Visitas desaprobadas --}}
                                <div class="row p-3 border rounded my-2">
                                    <div class="col-md-12">
                                        <h3 class="h4 ">
                                            <strong>
                                                Visitas desaprobadas
                                            </strong>
                                        </h3>
                                    </div>

                                    <div class="row col-md-12">
                                        @foreach ($visitas as $visita)
                                            @if ($visita->estado->nom_estado == 'Visita Desaprobada')
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
                            @endcan

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
