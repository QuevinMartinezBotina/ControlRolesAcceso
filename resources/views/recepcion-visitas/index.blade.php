@extends('layouts.app')

@section('title')
    Recepción de Visitas
@endsection

@section('content')

    {{-- Lista de visitas programadas --}}
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Lista de visitas programadas</h3>
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


                            {{-- Tabla de visitas --}}
                            @can('ver-recepcion-visita')
                                <table id="dataTables" class="table table-bordered  display nowrap table-hover table-striped"
                                    cellspacing="0" width="100%">
                                    <thead class="avi-bg-grey text-white">
                                        <tr class="text-white">
                                            {{-- <th class="text-white ">ID</th> --}}
                                            <th class="text-white ">Nombre del Visitante</th>
                                            <th class="text-white ">Area de Visita</th>
                                            <th class="text-white ">Fecha Programada</th>
                                            <th class="text-white ">Estado</th>
                                            <th class="text-white ">Acciones </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($visitas as $visita)
                                            <tr>
                                                <td class="">{{ $visita->nom_visitante }}</td>
                                                <td class="">{{ $visita->area->nom_area }}</td>
                                                <td class="">
                                                    {{ date('d-m-Y', strtotime($visita->fecha_programada)) }}
                                                </td>
                                                <td class="text-white">
                                                    <span class="badge d-flex justify-content-center p-2 text-dark fs-1"
                                                        style="background: {{ $visita->estado->color }}">
                                                        {{ $visita->estado->nom_estado }}
                                                    </span>
                                                <td>
                                                    <div class="row">

                                                        <div class="col-md-12 col-12">

                                                            @can('crear-recepcion-visita')
                                                                @if ($visita->estado->nom_estado == 'Visita Aprobada')
                                                                    <a class="btn btn-primary"
                                                                        href="{{ route('recepcion-visitas.createRecepcion', ['recepcion_visita' => $visita->id]) }}">Entrada
                                                                    </a>
                                                                @endif
                                                            @endcan

                                                            {{-- @can('ver-recepcion-visita')
                                                                <a class=" btn btn-warning"
                                                                    href="{{ route('recepcion-visitas.show', $visita) }}">Detalles
                                                                </a>
                                                            @endcan --}}

                                                        </div>
                                                    </div>

                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot class="">
                                        <th class=" ">Nombre del Visitante</th>
                                        <th class=" ">Area de Visita</th>
                                        <th class=" ">Fecha Programada</th>
                                        <th class=" ">Estado</th>
                                        <th class=" ">Acciones </th>
                                    </tfoot>
                                </table>
                            @endcan

                        </div>
                    </div>
                </div>
            </div>


        </div>
    </section>

    {{-- Lista de visitas en las intalaciones --}}
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Lista de visitas en instalaciones</h3>
        </div>
        <div class="section-body">
            <div class="row">

                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            @if ($message = Session::get('SuccessSalidaVisita'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>{{ $message }}</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif


                            {{-- Tabla de visitas --}}
                            @can('ver-recepcion-visita')
                                <table id="tablaRecepcionVisitas"
                                    class="table table-bordered  display nowrap table-hover table-striped" cellspacing="0"
                                    width="100%">
                                    <thead class="avi-bg-grey text-white">
                                        <tr class="text-white">
                                            <th class="text-white ">Nombre del Visitante</th>
                                            <th class="text-white ">Número documento</th>
                                            <th class="text-white ">Estado en instalaciones</th>
                                            <th class="text-white ">Entidad de la que viene</th>
                                            <th class="text-white ">Acciones </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($visitasInstalaciones as $visita)
                                            <tr>
                                                <td class="">{{ $visita->visita->nom_visitante }}</td>
                                                <td class="">{{ $visita->visita->num_documento }}</td>
                                                <td class="">
                                                    <span class="badge d-flex justify-content-center p-2 text-dark fs-1"
                                                        style="background: {{ $visita->estado->color }}">
                                                        {{ $visita->estado->nom_estado }}
                                                    </span>
                                                </td>
                                                <td class="">{{ $visita->visita->nom_empresa }}</td>
                                                <td>
                                                    <div class="row">
                                                        <div class="col-md-12 col-12">
                                                            <div class="row">

                                                                <form class="formEliminar col-6"
                                                                    action="{{ route('recepcion-visitas.destroy', $visita->id) }}"
                                                                    method="post">
                                                                    @method('DELETE')
                                                                    @csrf
                                                                    {{-- Botones de editar --}}
                                                                    @can('editar-recepcion-visita')
                                                                        <a class="btn btn-primary"
                                                                            href="{{ route('recepcion-visitas.edit', ['recepcion_visita' => $visita->id]) }}">Editar
                                                                        </a>
                                                                    @endcan
                                                                    @can('borrar-recepcion-visita')
                                                                        {{-- Boton eliminar --}}
                                                                        <button class="btn btn-danger" type="submit">Borrar</button>
                                                                    @endcan
                                                                </form>

                                                                @can('editar-salida')
                                                                    <form class="col-5 ml-2"
                                                                        action="{{ route('recepcion-visitas.salida', ['recepcion_visita' => $visita->id]) }}"
                                                                        method="POST">

                                                                        @csrf
                                                                        @method('PATCH')

                                                                        @if ($visita->fecha_salida == null)
                                                                            <button type="submit"
                                                                                class="btn btn-success">Salio</button>
                                                                        @endif


                                                                    </form>
                                                                @endcan
                                                            </div>

                                                        </div>
                                                    </div>

                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot class="">
                                        <th class="">Nombre del Visitante</th>
                                        <th class="">Número documento</th>
                                        <th class="">Estado en instalaciones</th>
                                        <th class="">Entidad de la que viene</th>
                                        <th class="">Acciones </th>
                                    </tfoot>
                                </table>
                            @endcan

                        </div>
                    </div>
                </div>
            </div>


        </div>
    </section>

@endsection
