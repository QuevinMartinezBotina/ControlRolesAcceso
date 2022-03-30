@extends('layouts.app')

@section('title')
    Recepción de Proveedores
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Recepción de Proveedores</h3>
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

                            @can('crear-recepcion-proveedor')
                                <a class="btn btn-success mb-4" href="{{ route('recepcion-proveedores.create') }}">Nuevo</a>
                            @endcan

                            @can('ver-recepcion-proveedor')
                                <table id="dataTables" class="table table-bordered  display nowrap table-hover table-striped"
                                    cellspacing="0" width="100%">
                                    <thead class="avi-bg-grey text-white">
                                        <tr class="text-white">
                                            <th class="text-white ">Empresa transportadora</th>
                                            <th class="text-white ">Empresa vendedora</th>
                                            <th class="text-white ">Estado</th>
                                            <th class="text-white ">Número placa</th>
                                            <th class="text-white ">Color vehículo</th>
                                            <th class="text-white ">Tipo</th>
                                            <th class="text-white ">Número de personas</th>
                                            <th class="text-white ">Documento</th>
                                            <th class="text-white ">Número documento</th>
                                            <th class="text-white ">Nombre</th>
                                            <th class="text-white ">Observaciones</th>
                                            <th class="text-white ">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($proveedores as $proveedor)
                                            <tr>
                                                <td class="">{{ $proveedor->empresa_transportadora }}</td>
                                                <td class="">{{ $proveedor->empresa_vendedora }}</td>
                                                <td class="">
                                                    <span class="badge d-flex justify-content-center p-2 text-dark fs-1"
                                                        style="background: {{ $proveedor->estado->color }}">
                                                        {{ $proveedor->estado->nom_estado }}
                                                    </span>
                                                </td>
                                                <td class="">{{ $proveedor->num_placa }}</td>
                                                <td class="">{{ $proveedor->color }}</td>
                                                <td class="">{{ $proveedor->tipo }}</td>
                                                <td class="">{{ $proveedor->num_personas }}</td>
                                                <td class="">{{ $proveedor->documento->tipo }}</td>
                                                <td class="">{{ $proveedor->num_documento }}</td>
                                                <td class="">{{ $proveedor->nombre }}</td>
                                                <td class="">{{ $proveedor->observaciones }}</td>
                                                <td>
                                                    <div class="row">
                                                        <div class="col-md-12 col-12">
                                                            <div class="row">

                                                                <form class="formEliminar col-6"
                                                                    action="{{ route('recepcion-proveedores.destroy', $proveedor->id) }}"
                                                                    method="post">
                                                                    @method('DELETE')
                                                                    @csrf
                                                                    {{-- Botones de editar --}}
                                                                    @can('editar-recepcion-proveedor')
                                                                        <a class="btn btn-primary"
                                                                            href="{{ route('recepcion-proveedores.edit', $proveedor->id) }}">Editar
                                                                        </a>
                                                                    @endcan
                                                                    @can('borrar-recepcion-proveedor')
                                                                        {{-- Boton eliminar --}}
                                                                        <button class="btn btn-danger" type="submit">Borrar</button>
                                                                    @endcan
                                                                </form>

                                                                @can('editar-salida')
                                                                    <form class="col-5 ml-2"
                                                                        action="{{ route('recepcion-proveedores.salida', ['recepcion_proveedor' => $proveedor->id]) }}"
                                                                        method="POST">

                                                                        @csrf
                                                                        @method('PATCH')

                                                                        @if ($proveedor->fecha_salida == null)
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
                                        <th class="">Empresa transportadora</th>
                                        <th class="">Empresa vendedora</th>
                                        <th class="">Estado</th>
                                        <th class="">Número placa</th>
                                        <th class="">Color vehículo</th>
                                        <th class="">Tipo</th>
                                        <th class="">Número de personas</th>
                                        <th class="">Documento</th>
                                        <th class="">Número documento</th>
                                        <th class="">Nombre</th>
                                        <th class="">Observaciones</th>
                                        <th class="">Acciones</th>
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
