@extends('layouts.app')

@section('title')
    Sedes
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Sedes</h3>
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

                            @can('crear-sede')
                                <a class="btn btn-success mb-4" href="{{ route('sedes.create') }}">Nuevo</a>
                            @endcan

                            @can('ver-sede')
                                <table id="dataTables" class="table table-bordered  display nowrap table-hover table-striped"
                                    cellspacing="0" width="100%">
                                    <thead class="avi-bg-grey text-white">
                                        <tr class="text-white">
                                            <th class="text-white ">ID</th>
                                            <th class="text-white ">Nombre de la sede</th>
                                            <th class="text-white ">Ciudad</th>
                                            <th class="text-white ">Departamento </th>
                                            <th class="text-white ">Acciones </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($sedes as $sede)
                                            <tr>
                                                <td class="">{{ $sede->id }}</td>
                                                <td class="">{{ $sede->nombre_sede }}</td>
                                                <td class="">{{ $sede->ciudad }}</td>
                                                <td class="">{{ $sede->departamento }}</td>

                                                <td>
                                                    <div class="row">

                                                        <div class="col-md-12 col-12">

                                                            <form class="formEliminar"
                                                                action="{{ route('sedes.destroy', $sede->id) }}"
                                                                method="post">
                                                                @method('DELETE')
                                                                @csrf
                                                                {{-- Botones de editar --}}
                                                                @can('editar-sede')
                                                                    <a class="btn btn-primary"
                                                                        href="{{ route('sedes.edit', $sede->id) }}">Editar
                                                                    </a>
                                                                @endcan
                                                                @can('borrar-sede')

                                                                    {{-- Boton eliminar --}}
                                                                    <button class="btn btn-danger" type="submit">Borrar</button>
                                                                @endcan
                                                            </form>

                                                        </div>
                                                    </div>

                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot class="">
                                        <th class=" ">ID</th>
                                        <th class=" ">Nombre de la sede</th>
                                        <th class=" ">Ciudad</th>
                                        <th class=" ">Departamento </th>
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
