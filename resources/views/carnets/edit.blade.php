@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Editar Estado</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            @if ($errors->any())
                                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                    <strong>¡Revise los campos! </strong>
                                    @foreach ($errors->all() as $error)
                                        <span class="badge badge-danger">{{ $error }}</span>
                                    @endforeach
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            @can('crear-estado')
                                <form action="{{ route('estados.update', $estado->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <label for="nom_estado">Nombre del Estado</label>
                                                <input type="text" name="nom_estado" class="form-control"
                                                    value="{{ $estado->nom_estado }}">
                                            </div>
                                        </div>

                                        <div class="col-xs-12 col-sm-12 col-md-2 w-50">
                                            <div class="form-group">
                                                <label for="color">Color del Estado</label>
                                                <input type="color" name="color" class="form-control"
                                                    value="{{ $estado->color }}">
                                            </div>
                                        </div>

                                        <div class="col-xs-12 col-sm-12 col-md-12">

                                            <button type="submit" class="btn btn-success m-1 ">Guardar</button>
                                            <a class="btn btn-primary m-1" href="{{ route('estados.index') }}">Volver</a>

                                        </div>
                                </form>
                            @endcan

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
