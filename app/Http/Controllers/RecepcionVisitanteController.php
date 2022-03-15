<?php

namespace App\Http\Controllers;

use App\Models\Carnet;
use App\Models\Estado;
use App\Models\RecepcionVisitante;
use App\Models\Visita;
use DateTime;
use DateTimeZone;
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

    public function createRecepcionVisita($recepcionVisitante)
    {
        $visita = Visita::find($recepcionVisitante);
        $carnets = Carnet::all();
        $estados = Estado::all();

        /* dd($visita); */
        return view('recepcion-visitas.crear', compact('visita', 'carnets', 'estados'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        request()->validate([
            'observaciones' => '',
            'fecha_entrada' => '',
            'fecha_salida' => '',
            'observaciones_equipos' => '',
            'marca' => '',
            'serial' => '',
            'planta_porteria' => '', //este campo es para saber si el equipo se dejo en porteria o salio
            'id_visita' => 'required',
            'id_estado' => 'required',
            'id_carnet' => 'required',

        ]);

        $Object = new DateTime();
        $Object->setTimezone(new DateTimeZone('America/Bogota'));
        $fecha_entrada = $Object->format("Y-m-d h:i:s ");

        $recepcionVisita = new RecepcionVisitante;

        $recepcionVisita->id_visita = $request->id_visita;

        $recepcionVisita->observaciones = $request->observaciones;
        $recepcionVisita->fecha_entrada = $fecha_entrada;
        $recepcionVisita->observaciones_equipos = $request->observaciones_equipos;
        $recepcionVisita->marca = $request->marca;
        $recepcionVisita->serial = $request->serial;
        $recepcionVisita->planta_porteria = $request->planta_porteria;
        $recepcionVisita->id_estado = $request->id_estado;
        $recepcionVisita->id_carnet = $request->id_carnet;

        $recepcionVisita->save();

        return redirect()->route('recepcion-visitas.index')->with('success', 'Datos agragados con extio');
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
    public function edit($recepcionVisitante)
    {
        /* echo $recepcionVisitante;
        exit; */

        /* dd($recepcionVisitante);
        exit; */

        $recepcionVisitante = Visita::find($recepcionVisitante);
        /* dd($recepcionVisitante); */


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
