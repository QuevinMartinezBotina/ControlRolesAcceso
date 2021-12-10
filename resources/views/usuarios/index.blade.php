@extends('layouts.app')

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
                            <a class="btn btn-success" href="{{ route('usuarios.create') }}">Nuevo</a>

                            <table class="table table-striped mt-3 table-hover ">
                                <thead class=" bg-primary text-white">
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
                                                {{-- Botones de editar y eliminar --}}
                                                <a class="btn btn-primary"
                                                    href="{{ route('usuarios.edit', $usuario->id) }}">Editar
                                                </a>

                                                {!! Form::open(['method' => 'DELETE', 'route' => ['usuarios.destroy', $usuario->id], 'style' => 'display:inline ']) !!}
                                                {!! Form::submit('Borrar', ['class' => 'btn btn-danger']) !!}
                                                {!! Form::close() !!}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot class="pagination justify-content-end">
                                    <tr>
                                        {!! $usuarios->links() !!}
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
