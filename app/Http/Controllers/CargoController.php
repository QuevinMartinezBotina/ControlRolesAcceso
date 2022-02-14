<?php

namespace App\Http\Controllers;

use App\Models\Cargo;
use Illuminate\Http\Request;

class CargoController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-cargo|crear-cargo|editar-cargo|borrar-cargo')->only('index');
        $this->middleware('permission:crear-cargo', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-cargo', ['only' => ['edit', 'update']]);
        $this->middleware('permission:borrar-cargo', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cargos = Cargo::all();

        return view('cargos.index', compact('cargos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cargos.create');
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
            'nom_cargo' => 'required',
        ]);

        Cargo::create($request->all());

        return redirect()->route('cargos.create')->with('success', 'Cargo creado con exito!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cargo  $cargo
     * @return \Illuminate\Http\Response
     */
    public function show(Cargo $cargo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cargo  $cargo
     * @return \Illuminate\Http\Response
     */
    public function edit(Cargo $cargo)
    {
        return view('cargos.edit', compact('cargo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cargo  $cargo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cargo $cargo)
    {
        request()->validate([
            'nom_cargo' => 'required',
        ]);

        $cargo->update($request->all());

        return redirect()->route('cargos.index')->with('success', 'Actualizado con exito!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cargo  $cargo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cargo $cargo)
    {
        $cargo->delete();

        return redirect()->route('cargos.index');
    }
}
