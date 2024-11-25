@extends('layouts.app')

@section('title')
    Editar Area
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Editar Area</h3>
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
                                <form action="{{ route('areas.update', $area->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <label for="nom_area">Nombre del Area</label>
                                                <input type="text" name="nom_area" class="form-control"
                                                    value="{{ $area->nom_area }}">
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <label for="id_user">Jefe del Area</label>
                                                <select name="id_user" class="form-select form-control">
                                                    <option class="avi-text-green" value="{{ $area->id_user }}">
                                                        {{ $area->user->name }} -
                                                        <i class="avi-text-green">Jefe actual</i>
                                                    </option>
                                                    <hr>
                                                    @foreach ($users as $user)
                                                        <option class="form-control" value="{{ $user->id }}">
                                                            {{ $user->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-xs-12 col-sm-12 col-md-12">

                                            <button type="submit" class="btn btn-success m-1 ">Guardar</button>
                                            <a class="btn btn-primary m-1" href="{{ route('areas.index') }}">Volver</a>

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
