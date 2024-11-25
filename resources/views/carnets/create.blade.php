@extends('layouts.app')

@section('title')
    Crear Carnet
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Crear Carnet</h3>
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

                            @can('crear-carnet')
                                <form action="{{ route('carnets.store') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <label for="numero">Número de Carnet</label>
                                                <input type="number" name="numero" class="form-control"
                                                    value="{{ old('numero') }}">
                                            </div>
                                        </div>

                                        <div class="col-xs-12 col-sm-12 col-md-2 ">
                                            <div class="form-group">
                                                <label for="id_estado">Estado del Carnet</label>
                                                <select class="form-control" name="id_estado"
                                                    value="{{ old('id_estado') }}">
                                                    @foreach ($estados as $estado)
                                                        @if ($estado->modulo == 'carnets')
                                                            <option style="background: ; " value="{{ $estado->id }}">
                                                                {{ $estado->nom_estado }}
                                                                <span class="text-info"></span>
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        {{-- <div class="col-xs-12 col-sm-12 col-md-2 w-50">
                                            <div class="form-group">
                                                <label for="id_estado">Estado del Carnet</label>
                                                <div name="id_estado" class="form-select">
                                                    @foreach ($estados as $estado)
                                                        @if ($estado->modulo == 'carnets')
                                                            <span style="" value="{{ $estado->id }}">
                                                                {{ $estado->nom_estado }}{{ $estado->color }}
                                                            </span>
                                                            <span style="background: {{ $estado->color }}"
                                                                value="{{ $estado->id }}">
                                                                .
                                                            </span>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div> --}}
                                        <div class="col-xs-12 col-sm-12 col-md-12">

                                            <button type="submit" class="btn btn-success m-1 ">Guardar</button>
                                            <a class="btn btn-primary m-1" href="{{ route('carnets.index') }}">Volver</a>

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
