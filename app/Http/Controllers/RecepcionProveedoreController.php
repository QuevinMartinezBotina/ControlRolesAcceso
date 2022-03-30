<?php

namespace App\Http\Controllers;

use App\Models\Documento;
use App\Models\Estado;
use App\Models\RecepcionProveedore;
use DateTime;
use DateTimeZone;
use Illuminate\Http\Request;

class RecepcionProveedoreController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:ver-recepcion-proveedor|crear-recepcion-proveedor|editar-recepcion-proveedor|borrar-recepcion-proveedor', ['only' => ['index']]);
        $this->middleware('permission:crear-recepcion-proveedor', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-recepcion-proveedor', ['only' => ['edit', 'update']]);
        $this->middleware('permission:editar-salida', ['only' => ['salidaProveedor']]);
        $this->middleware('permission:borrar-recepcion-proveedor', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proveedores = RecepcionProveedore::all();

        return view('recepcion-recepcion-proveedores.index', compact('proveedores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estados = Estado::all();
        $documentos = Documento::all();

        return view('recepcion-recepcion-proveedores.create', compact('estados', 'documentos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if (
            $request->empresa_transportadora == null &&
            $request->empresa_vendedora == null &&
            $request->num_placa == null &&
            $request->color == null &&
            $request->tipo == null &&
            $request->num_personas == null &&
            $request->num_documento == null &&
            $request->nombre == null &&
            $request->observaciones == null
        ) {
            return redirect()->route('recepcion-recepcion-proveedores.create')->with('success', 'Los campos estan vacios');
        } else {

            $this->validate($request, [
                'empresa_transportadora' /*=> 'required'*/,
                'empresa_vendedora' /*=> 'required'*/,
                'num_placa' /*=> 'required'*/,
                'color' /*=> 'required'*/,
                'tipo' /*=> 'required'*/,
                'num_personas' /*=> 'required'*/,
                'num_documento' /*=> 'required'*/,
                'nombre' /*=> 'required'*/,
                'observaciones' /*=> 'required'*/,

                'id_estado' /*=> 'required'*/,
                'id_documento' /*=> 'required'*/,
                'fecha_entrada' /*=> 'required'*/,
                'fecha_salida' /*=> 'required'*/,

            ]);

            /*
            ? Operaciones para encontrar estado y asignar horas y fechas
             */

            //*Fecha
            $Object = new DateTime();
            $Object->setTimezone(new DateTimeZone('America/Bogota'));
            $fecha_sistema = $Object->format("Y-m-d h:i:s ");

            //*Estado
            $estados = Estado::all('id', 'nom_estado');

            foreach ($estados as $estado) {
                if ($estado->nom_estado == 'En instalaciones') {
                    $id_Estado = $estado->id;
                }
            }

            $recepcionProveedor = new RecepcionProveedore;
            $recepcionProveedor->empresa_transportadora = $request->empresa_transportadora;
            $recepcionProveedor->empresa_vendedora = $request->empresa_vendedora;
            $recepcionProveedor->num_placa = $request->num_placa;
            $recepcionProveedor->color = $request->color;
            $recepcionProveedor->tipo = $request->tipo;
            $recepcionProveedor->num_personas = $request->num_personas;
            $recepcionProveedor->num_documento = $request->num_documento;
            $recepcionProveedor->nombre = $request->nombre;
            $recepcionProveedor->observaciones = $request->observaciones;
            $recepcionProveedor->fecha_entrada = $fecha_sistema;

            $recepcionProveedor->id_estado = $id_Estado;
            $recepcionProveedor->id_documento = $request->id_documento;

            $recepcionProveedor->save();

            return redirect()->route('recepcion-recepcion-proveedores.create')->with('success', 'Creado con exito');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RecepcionProveedore  $recepcionProveedore
     * @return \Illuminate\Http\Response
     */
    public function show(RecepcionProveedore $recepcionProveedore)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RecepcionProveedore  $recepcionProveedore
     * @return \Illuminate\Http\Response
     */
    public function edit(RecepcionProveedore $recepcionProveedore)
    {

        $estados = Estado::all();
        $documentos = Documento::all();

        return view('recepcion-recepcion-proveedores.edit', compact('estados', 'documentos', 'recepcionProveedore'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RecepcionProveedore  $recepcionProveedore
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RecepcionProveedore $recepcionProveedore)
    {
        request()->validate([
            'numero' => 'required',
            'id_estado' => 'required',
        ]);

        $recepcionProveedore->update($request->all());


        return redirect()->route('carnets.index')->with('success', 'Actualizado con exito!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RecepcionProveedore  $recepcionProveedore
     * @return \Illuminate\Http\Response
     */
    public function destroy($recepcionProveedore)
    {
        /* echo 'Hello world' . $recepcionProveedore;
        exit; */

        RecepcionProveedore::find($recepcionProveedore)->delete();
        return redirect()->route('recepcion-recepcion-proveedores.index')->with('success', 'Eliminado con exito!');
    }

    public function salidaProveedor(Request $request,  $recepcionProveedore)
    {
        /* echo 'Hello world';
        dd($recepcionProveedore);
        exit; */

        /* dd($recepcionProveedore);
        exit; */

        /*
            * Operaciones para encontrar estado y asignar horas y fechas
        */

        //?Fecha
        $Object = new DateTime();
        $Object->setTimezone(new DateTimeZone('America/Bogota'));
        $fecha_sistema = $Object->format("Y-m-d h:i:s ");

        //?Estado
        $estados = Estado::all('id', 'nom_estado');

        foreach ($estados as $estado) {
            if ($estado->nom_estado == 'Fuera de instalaciones') {
                $id_Estado = $estado->id;
            }
        }

        $proveedor = RecepcionProveedore::find($recepcionProveedore);

        $proveedor->id_estado = $id_Estado;
        $proveedor->fecha_salida = $fecha_sistema;
        $proveedor->save();

        return redirect()->route('recepcion-recepcion-proveedores.index')->with('success', 'Salida registrada con exito!');
    }
}
