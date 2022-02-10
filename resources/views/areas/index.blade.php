@extends('layouts.app')

@section('title')
    Areas
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Areas</h3>
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

                            @can('crear-area')
                                <a class="btn btn-success mb-4" href="{{ route('areas.create') }}">Nuevo</a>
                            @endcan

                            @can('ver-area')
                                <table id="dataTables" class="table table-bordered  display nowrap table-hover table-striped"
                                    cellspacing="0" width="100%">
                                    <thead class="avi-bg-grey text-white">
                                        <tr class="text-white">
                                            <th class="text-white ">ID</th>
                                            <th class="text-white ">Nombre del Area</th>
                                            <th class="text-white ">Jefe del Area</th>
                                            <th class="text-white ">Acciones </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($areas as $area)
                                            <tr>
                                                <td class="">{{ $area->id }}</td>
                                                <td class="">{{ $area->nom_area }}</td>
                                                <td class="">{{ $area->user->name }}</td>

                                                <td>
                                                    <div class="row">

                                                        <div class="col-md-12 col-12">

                                                            <form class="formEliminar"
                                                                action="{{ route('areas.destroy', $area->id) }}"
                                                                method="post">
                                                                @method('DELETE')
                                                                @csrf
                                                                {{-- Botones de editar --}}
                                                                @can('editar-sede')
                                                                    <a class="btn btn-primary"
                                                                        href="{{ route('areas.edit', $area->id) }}">Editar
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
                                        <th class=" ">Nombre del Area</th>
                                        <th class=" ">Jefe del Area</th>
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
