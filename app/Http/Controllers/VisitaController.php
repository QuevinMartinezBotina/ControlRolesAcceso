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
        $this->middleware('permission:ver-visita|crear-visita|editar-visita|borrar-visita', ['only' => ['index']]);
        $this->middleware('permission:crear-visita', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-visita', ['only' => ['edit', 'update']]);
        $this->middleware('permission:borrar-visita', ['only' => ['destroy']]);
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

        /*  $correo = new  EmailAutorizacionesVisitas;
        Mail::to($emailJefeArea)->send($correo); */

        Mail::to($emailJefeArea)->send(new EmailAutorizacionesVisitas($request));


        /* echo "Mensaje enviado a: " . $emailJefeArea;

        exit; */

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

        Visita::create($request->all());


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

        return view('visitas.show', compact('visita'));
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

        return view('visitas.aprobations', compact('visitas'));
    }

    public function aprobar(Request $request, Visita $visita)
    {

        $estados = Estado::all('id', 'nom_estado');

        foreach ($estados as $estado) {
            if ($estado->nom_estado == 'Visita Aprobada') {
                $id_EstadoArea = $estado->id;
            }
        }

        /* echo  $id_EstadoArea;
        exit; */

        $visita =  Visita::find($visita->id);
        $visita->id_estado = $id_EstadoArea;

        $visita->update();

        /* Estado::create($request->all()); */

        return redirect()->route('aprobaciones')->with('success', 'Visita aprobada con exito!');
    }

    public function denegar(Request $request, Visita $visita)
    {
        $visita = Visita::find($visita->id);
        $visita->id_estado = null;

        $visita->update();

        return redirect()->route('aprobaciones')->with('success', 'Visita denegada con exito!');
    }
}
