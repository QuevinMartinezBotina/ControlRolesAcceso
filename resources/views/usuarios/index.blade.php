@extends('layouts.app')

@section('title')
    Usuarios
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Usuarios</h3>
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

                            @can('crear-usuario')
                                <a class="btn btn-success mb-4" href="{{ route('usuarios.create') }}">Nuevo</a>
                            @endcan

                            @can('ver-usuario')
                                <table id="dataTables"
                                    class=" display nowrap table table-striped mt-3 table-hover table-bordered" cellspacing="0"
                                    width="100%">
                                    <thead class=" avi-bg-grey text-white rounded">
                                        <tr class="text-white">
                                            <th class="text-white muted" style="display: none;">ID</th>
                                            <th class="text-white ">Nombre</th>
                                            <th class="text-white ">Correo</th>
                                            <th class="text-white ">Rol</th>
                                            <th class="text-white ">Acciones </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($usuarios as $usuario)
                                            <tr>
                                                <td class="" style="display: none;">{{ $usuario->id }}</td>
                                                <td class="">{{ $usuario->name }}</td>
                                                <td class="">{{ $usuario->email }}</td>
                                                <td>
                                                    @if (!empty($usuario->getRoleNames()))
                                                        @foreach ($usuario->getRolenames() as $rolName)
                                                            <h5><span class="badge badge-dark">{{ $rolName }}</span></h5>
                                                        @endforeach
                                                    @endif
                                                </td>

                                                <td>
                                                    <div class="row">

                                                        <div class="col-md-12 col-12">

                                                            <form class="formEliminar"
                                                                action="{{ route('usuarios.destroy', $usuario->id) }}"
                                                                method="post">
                                                                @method('DELETE')
                                                                @csrf
                                                                {{-- Botones de editar --}}
                                                                @can('editar-usuario')
                                                                    <a class="btn btn-primary"
                                                                        href="{{ route('usuarios.edit', $usuario->id) }}">Editar
                                                                    </a>
                                                                @endcan
                                                                @can('borrar-usuario')

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
                                        <th class="text-dark muted" style="display: none;">ID</th>
                                        <th class="text-dark ">Nombre</th>
                                        <th class="text-dark ">Correo</th>
                                        <th class="text-dark ">Rol</th>
                                        <th class="text-dark ">Acciones </th>
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
