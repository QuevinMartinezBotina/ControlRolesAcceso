<?php

namespace App\Http\Controllers;

use App\Models\Sede;
use Illuminate\Http\Request;

class SedeController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-sede|crear-sede|editar-sede|borrar-sede', ['only' => ['index']]);
        $this->middleware('permission:crear-sede', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-sede', ['only' => ['edit', 'update']]);
        $this->middleware('permission:borrar-sede', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sedes = Sede::all();

        return view('sedes.index', compact('sedes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sedes.create');
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
            'nombre_sede' => 'required',
            'ciudad' => 'required',
            'departamento' => 'required',
        ]);

        Sede::create($request->all());

        return redirect()->route('sedes.create')->with('success', 'Sede creada con exito!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sede  $sede
     * @return \Illuminate\Http\Response
     */
    public function show(Sede $sede)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sede  $sede
     * @return \Illuminate\Http\Response
     */
    public function edit(Sede $sede)
    {
        return view('sedes.edit', compact('sede'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sede  $sede
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sede $sede)
    {
        request()->validate([
            'nombre_sede' => 'required',
            'ciudad' => 'required',
            'departamento' => 'required',
        ]);

        $sede->update($request->all());

        return redirect()->route('sedes.index')->with('success', 'Actualizado con exito!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sede  $sede
     * @return \Illuminate\Http\Response
     */
    public function destroy($sede)
    {
        Sede::find($sede)->delete();
        return redirect()->route('sedes.index')/* ->with('success', 'Eliminado con exito!') */;
    }
}
