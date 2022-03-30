<?php

namespace App\Http\Controllers;

use App\Mail\EmailAutorizacionesVisitas;
use App\Models\Area;
use App\Models\Documento;
use App\Models\Estado;
use App\Models\Sede;
use App\Models\Visita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;



use League\CommonMark\Block\Element\Document;

class VisitaController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:ver-visita|crear-visita|editar-visita|borrar-visita|aprobacion-aprobar|aprobacion-denegar|visita-volver', ['only' => ['index']]);
        $this->middleware('permission:crear-visita', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-visita', ['only' => ['edit', 'update']]);
        $this->middleware('permission:borrar-visita', ['only' => ['destroy']]);
        /*
          * Para los permisos de las accciones de las aprobaciones
        */
        $this->middleware('permission:aprobacion-ver-desaprobados|ver-aprobacion|aprobacion-ver-aprobados|aprobacion-ver-por-aprobar|aprobacion-volver', ['only' => ['aprobaciones']]);

        $this->middleware('permission:aprobacion-aprobar', ['only' => ['aprobarVisita']]);
        $this->middleware('permission:aprobacion-denegar', ['only' => ['denegarVisita']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $visitas = Visita::all();
        $i = 0;
        return view('visitas.index', compact('visitas', 'i'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $documentos = Documento::all();
        $areas = Area::all();
        $sedes = Sede::all();
        return view('visitas.create', compact('documentos', 'areas', 'sedes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'nom_visitante' => 'required',
            'num_documento' => 'required',
            'telefono' => 'required',
            'correo' => 'required',
            'nom_empresa' => 'required',
            'arl_empresa' => 'required',
            'motivo_visita' => 'required',
            /* 'observaciones' => 'required', */
            'fecha_programada' => 'required',
            /* 'fecha_visita' => 'required', */
            /* 'placa' => 'required',
                    'color' => 'required',
                    'tipo' => 'required', */
            'id_documento' => 'required',
            'id_area' => 'required',
            'id_sede' => 'required',
        ]);

        $estados = Estado::all('id', 'nom_estado');

        foreach ($estados as $estado) {
            if ($estado->nom_estado == 'Visita Por Aprobar') {
                $id_EstadoArea = $estado->id;
            }
        }

        /* var_dump($id_EstadoArea);
        exit; */
        $visita = new Visita();

        $visita->nom_visitante = ucwords($request->nom_visitante);
        $visita->id_documento = $request->id_documento;
        $visita->num_documento = $request->num_documento;
        $visita->telefono = $request->telefono;
        $visita->correo = $request->correo;
        $visita->nom_empresa = ucwords($request->nom_empresa);
        $visita->arl_empresa = ucwords($request->arl_empresa);
        $visita->id_area = $request->id_area;
        $visita->motivo_visita = $request->motivo_visita;
        $visita->observaciones = $request->observaciones;
        $visita->id_sede = $request->id_sede;
        $visita->fecha_programada = $request->fecha_programada;
        $visita->fecha_visita = $request->fecha_visita;
        $visita->tipo = $request->tipo;
        //$visita->tipo = ucfirst($request->tipo);
        $visita->placa = strtoupper($request->placa);
        $visita->color = $request->color;
        //$visita->color = $request->ucfirst($request->color);

        $visita->id_estado = $id_EstadoArea;

        $visita->save();

        /* *
        *  Para traer el correo actual del area
        * */

        $users = DB::table('users')
            ->join('areas', 'users.id', '=', 'areas.id_user')
            ->select('users.email')
            ->where('areas.id', '=', $request->id_area)
            ->get();

        foreach ($users as $user) {

            $emailJefeArea = $user->email;
        }

        echo $request->nom_visitante;

        Mail::to($emailJefeArea)->send(new EmailAutorizacionesVisitas($visita));

        return redirect()->route('visitas.create')->with('success', 'Visita creada con exito!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Visita  $visita
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Visita $visita)
    {
        $visitas = Visita::all();

        return view('visitas.show', compact('visita', 'visitas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Visita  $visita
     * @return \Illuminate\Http\Response
     */
    public function edit(Visita $visita)
    {

        $documentos = Documento::all();
        $areas = Area::all();
        $sedes = Sede::all();
        return view('visitas.edit', compact('documentos', 'areas', 'sedes', 'visita'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Visita  $visita
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Visita $visita)
    {
        $this->validate($request, [
            'nom_visitante' => 'required',
            'num_documento' => 'required',
            'telefono' => 'required',
            'correo' => 'required',
            'nom_empresa' => 'required',
            'arl_empresa' => 'required',
            'motivo_visita' => 'required',
            /* 'observaciones' => 'required', */
            'fecha_programada' => 'required',
            /* 'fecha_visita' => 'required', */
            /* 'placa' => 'required',
            'color' => 'required',
            'tipo' => 'required', */
            'id_documento' => 'required',
            'id_area' => 'required',
            'id_sede' => 'required',
        ]);

        $visita->nom_visitante = strtolower($request->nom_visitante);
        $visita->update($request->all());

        return redirect()->route('visitas.index')->with('success', 'Actualizado con exito!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Visita  $visita
     * @return \Illuminate\Http\Response
     */
    public function destroy(Visita $visita)
    {
        $visita->delete();

        return redirect()->route('visitas.index');
    }

    /*
    *
    * Apartado de las aprobaciones
    *
    */

    public function aprobaciones()
    {
        $visitas = Visita::all();
        $estados = Estado::all();

        return view('visitas.aprobations', compact('visitas', 'estados'));
    }

    /*
        !Funciones base para aprobar y denegar visitas
    */
    public function Aprobar(Visita $visita/* , $view */)
    {

        $estados = Estado::all('id', 'nom_estado');

        foreach ($estados as $estado) {
            if ($estado->nom_estado == 'Visita Aprobada') {
                $id_EstadoArea = $estado->id;
            }
        }

        $visita =  Visita::find($visita->id);
        $visita->id_estado = $id_EstadoArea;

        $visita->update();
    }

    public function Denegar(Visita $visita)
    {
        $estados = Estado::all('id', 'nom_estado');

        foreach ($estados as $estado) {
            if ($estado->nom_estado == 'Visita Desaprobada') {
                $id_EstadoArea = $estado->id;
            }
        }

        $visita = Visita::find($visita->id);
        $visita->id_estado = $id_EstadoArea;

        $visita->update();
    }

    /*
    ?Funciones para funcionamiento de aprobaciones por la web
    */

    public function aprobarVisita(Visita $visita)
    {

        $this->Aprobar($visita);
        return redirect()->route('aprobaciones')->with('success', 'Visita aprobada con exito!');
    }

    public function denegarVisita(Visita $visita)
    {

        $this->Denegar($visita);
        return redirect()->route('aprobaciones')->with('success', 'Visita denegada con exito!');
    }
}
