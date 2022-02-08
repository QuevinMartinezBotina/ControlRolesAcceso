@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Estados</h3>
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

                            @can('crear-estado')
                                <a class="btn btn-success mb-4" href="{{ route('estados.create') }}">Nuevo</a>
                            @endcan

                            @can('ver-estado')
                                <table id="dataTables" class="table table-bordered  display nowrap" cellspacing="0"
                                    width="100%">
                                    <thead class="bg-primary text-white">
                                        <tr class="text-white">
                                            <th class="text-white ">ID</th>
                                            <th class="text-white ">Nombre Estado</th>
                                            <th class="text-white ">Color Estado</th>
                                            <th class="text-white ">Acciones </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($estados as $estado)
                                            <tr>
                                                <td class="">{{ $estado->id }}</td>
                                                <td class="">{{ $estado->nom_estado }}</td>
                                                <td>
                                                    <span class="badge d-flex justify-content-center "
                                                        style="background: {{ $estado->color }}">
                                                    </span>
                                                </td>
                                                <td>
                                                    <div class="row">

                                                        <div class="col-md-12 col-12">

                                                            <form class="formEliminar"
                                                                action="{{ route('estados.destroy', $estado->id) }}"
                                                                method="post">
                                                                @method('DELETE')
                                                                @csrf
                                                                {{-- Botones de editar --}}
                                                                @can('editar-estado')
                                                                    <a class="btn btn-primary"
                                                                        href="{{ route('estados.edit', $estado->id) }}">Editar
                                                                    </a>
                                                                @endcan
                                                                @can('borrar-estado')

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
                                        <th class="">ID</th>
                                        <th class="">Nombre</th>
                                        <th class="">Color</th>
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
