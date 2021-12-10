@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Roles</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            @can('crear-rol')
                                <a class="btn btn-success" href="{{ route('roles.create') }}">Nuevo</a>
                            @endcan

                            <table class="table table-striped mt-3 table-hover ">
                                <thead class=" bg-primary text-white">
                                    <tr class="text-white">
                                        <th class="text-white ">Rol</th>
                                        <th class="text-white ">Acciones </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($roles as $role)
                                        <tr>
                                            <td class="">{{ $role->name }}</td>
                                            <td>
                                                {{-- Botones de editar y eliminar --}}
                                                @can('editar-rol')
                                                    <a class="btn btn-primary"
                                                        href="{{ route('roles.edit', $role->id) }}">Editar
                                                    </a>
                                                @endcan

                                                @can('borrar-rol')
                                                    {!! Form::open(['method' => 'DELETE', 'route' => ['roles.destroy', $role->id], 'style' => 'display:inline ']) !!}
                                                    {!! Form::submit('Borrar', ['class' => 'btn btn-danger']) !!}
                                                    {!! Form::close() !!}
                                                @endcan
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot class="pagination justify-content-end">
                                    <tr>
                                        {!! $roles->links() !!}
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
