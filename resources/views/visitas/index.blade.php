@extends('layouts.app')

@section('title')
    Visitas
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Visitas</h3>
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

                            @can('crear-visita')
                                <a class="btn btn-success mb-4" href="{{ route('visitas.create') }}">Nuevo</a>
                            @endcan

                            @can('ver-visita')
                                <table id="dataTables" class="table table-bordered  display nowrap table-hover table-striped"
                                    cellspacing="0" width="100%">
                                    <thead class="avi-bg-grey text-white">
                                        <tr class="text-white">
                                            {{-- <th class="text-white ">ID</th> --}}
                                            <th class="text-white ">Nombre del Visitante</th>
                                            {{-- <th class="text-white ">Tipo de Documento</th>
                                            <th class="text-white ">Número de Documento</th>
                                            <th class="text-white ">Teléfono</th>
                                            <th class="text-white ">Correo</th> --}}
                                            <th class="text-white ">Empresa</th>
                                            {{-- <th class="text-white ">Arl Empresa</th> --}}
                                            <th class="text-white ">Area de Visita</th>
                                            <th class="text-white ">Motivo</th>
                                            {{-- <th class="text-white ">Observaciones</th> --}}
                                            <th class="text-white ">Fecha Programada</th>
                                            {{-- <th class="text-white ">Fecha Visita</th> --}}
                                            {{-- <th class="text-white ">Sede</th> --}}
                                            {{-- <th class="text-white ">Placa</th>
                                            <th class="text-white ">Color</th>
                                            <th class="text-white ">Tipo Vehículo</th> --}}
                                            <th class="text-white ">Acciones </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($visitas as $visita)
                                            <tr>
                                                {{-- <td class="">{{ ++$i }}</td> --}}
                                                <td class="">{{ $visita->nom_visitante }}</td>
                                                {{-- <td class="">{{ $visita->documento->tipo }}</td>
                                                <td class="">{{ $visita->num_documento }}</td>
                                                <td class="">{{ $visita->telefono }}</td>
                                                <td class="">{{ $visita->correo }}</td> --}}
                                                <td class="">{{ $visita->nom_empresa }}</td>
                                                {{-- <td class="">{{ $visita->arl_empresa }}</td> --}}
                                                <td class="">{{ $visita->area->nom_area }}</td>
                                                <td class="">{{ $visita->motivo_visita }}</td>
                                                {{-- <td class="">{{ $visita->observaciones }}</td> --}}
                                                <td class="">
                                                    {{ date('d-m-Y', strtotime($visita->fecha_programada)) }}</td>
                                                {{-- <td class="">{{ $visita->fecha_visita }}</td> --}}
                                                {{-- <td class="">{{ $visita->sede->nombre_sede }}</td> --}}
                                                {{-- <td class="">{{ $visita->placa }}</td>
                                                <td class="">{{ $visita->color }}</td>
                                                <td class="">{{ $visita->tipo }}</td> --}}

                                                <td>
                                                    <div class="row">

                                                        <div class="col-md-12 col-12">

                                                            <form class="formEliminar"
                                                                action="{{ route('visitas.destroy', $visita->id) }}"
                                                                method="post">
                                                                @method('DELETE')
                                                                @csrf
                                                                {{-- Botones de editar --}}
                                                                @can('editar-visita')
                                                                    <a class="btn btn-primary"
                                                                        href="{{ route('visitas.edit', $visita->id) }}">Editar
                                                                    </a>
                                                                @endcan
                                                                @can('borrar-visita')
                                                                    {{-- Boton eliminar --}}
                                                                    <button class="btn btn-danger" type="submit">Borrar</button>
                                                                @endcan
                                                                @can('ver-visita')
                                                                    <a class="btn btn-warning"
                                                                        href="{{ route('visitas.show', $visita) }}">Detalles
                                                                    </a>
                                                                @endcan

                                                            </form>

                                                        </div>
                                                    </div>

                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot class="">
                                        {{-- <th class="text-white ">ID</th> --}}
                                        <th class=" ">Nombre del Visitante</th>
                                        {{-- <th class=" ">Tipo de Documento</th>
                                        <th class=" ">Número de Documento</th>
                                        <th class=" ">Teléfono</th>
                                        <th class=" ">Correo</th> --}}
                                        <th class=" ">Empresa</th>
                                        {{-- <th class=" ">Arl Empresa</th> --}}
                                        <th class=" ">Area de Visita</th>
                                        <th class=" ">Motivo</th>
                                        {{-- <th class=" ">Observaciones</th> --}}
                                        <th class=" ">Fecha Programada</th>
                                        {{-- <th class=" ">Fecha Visita</th> --}}
                                        {{-- <th class=" ">Sede</th> --}}
                                        {{-- <th class=" ">Placa</th>
                                        <th class=" ">Color</th>
                                        <th class=" ">Tipo Vehículo</th> --}}
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
@endsection
