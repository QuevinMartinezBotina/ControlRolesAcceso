<?php

namespace App\Http\Controllers;

use App\Models\Carnet;
use App\Models\Estado;
use App\Models\RecepcionVisitante;
use App\Models\Visita;
use Illuminate\Http\Request;

class RecepcionVisitanteController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:ver-recepcion-visita|crear-recepcion-visita|editar-recepcion-visita|borrar-recepcion-visita', ['only' => ['index']]);
        $this->middleware('permission:crear-recepcion-visita', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-recepcion-visita', ['only' => ['edit', 'update']]);
        $this->middleware('permission:borrar-recepcion-visita', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $visitas = Visita::all();

        return view('recepcion-visitas.index', compact('visitas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RecepcionVisitante  $recepcionVisitante
     * @return \Illuminate\Http\Response
     */
    public function show(RecepcionVisitante $recepcionVisitante)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RecepcionVisitante  $recepcionVisitante
     * @return \Illuminate\Http\Response
     */
    public function edit(RecepcionVisitante $recepcionVisitante)
    {
        echo $recepcionVisitante;
        exit;

        return view('recepcion-visitas.edit', compact('recepcionVisitante'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RecepcionVisitante  $recepcionVisitante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RecepcionVisitante $recepcionVisitante)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RecepcionVisitante  $recepcionVisitante
     * @return \Illuminate\Http\Response
     */
    public function destroy(RecepcionVisitante $recepcionVisitante)
    {
        //
    }
}
