<?php

namespace App\Http\Controllers;

use App\Models\Carnet;
use App\Models\Estado;
use Illuminate\Http\Request;


class CarnetController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:ver-carnet|crear-carnet|editar-carnet|borrar-carnet', ['only' => ['index']]);
        $this->middleware('permission:crear-carnet', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-carnet', ['only' => ['edit', 'update']]);
        $this->middleware('permission:borrar-carnet', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carnets = Carnet::all();

        return view('carnets.index', compact('carnets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $carnet = new Carnet();
        $estados = Estado::all();
        return view('carnets.create', compact('carnet', 'estados'));
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
            'numero' => 'required',
            'id_estado' => 'required',
        ]);

        Carnet::create($request->all());

        return redirect()->route('carnets.create')->with('success', 'Carnet creado con exito!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Carnet  $carnet
     * @return \Illuminate\Http\Response
     */
    public function show(Carnet $carnet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Carnet  $carnet
     * @return \Illuminate\Http\Response
     */
    public function edit(Carnet $carnet)
    {
        $estados = Estado::all();
        return view('carnets.edit', compact('carnet', 'estados'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Carnet  $carnet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Carnet $carnet)
    {
        request()->validate([
            'numero' => 'required',
            'id_estado' => 'required',
        ]);

        $carnet->update($request->all());


        return redirect()->route('carnets.index')->with('success', 'Actualizado con exito!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Carnet  $carnet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Carnet $carnet)
    {
        $carnet->delete();

        return redirect()->route('carnets.index');
    }
}
