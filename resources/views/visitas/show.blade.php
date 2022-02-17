@extends('layouts.app')

@section('title')
    Detalles Visita
@endsection

@section('content')
    <section class="section ">
        <div class="section-header">
            <h3 class="page__heading">Detalles Visita</h3>
        </div>
        <div class="section-body ">
            <div class="row ">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body shadow-lg">

                            @can('ver-visita')
                                {{ $visita->nom_visitante }}
                            @endcan

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
