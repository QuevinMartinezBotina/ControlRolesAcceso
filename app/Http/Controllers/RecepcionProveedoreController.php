<?php

namespace App\Http\Controllers;

use App\Models\RecepcionProveedore;
use Illuminate\Http\Request;

class RecepcionProveedoreController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:ver-proveedor|crear-proveedor|editar-proveedor|borrar-proveedor', ['only' => ['index']]);
        $this->middleware('permission:crear-proveedor', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-proveedor', ['only' => ['edit', 'update']]);
        $this->middleware('permission:borrar-proveedor', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proveedores = RecepcionProveedore::all();

        return view('recepcion-proveedores.index', compact('proveedores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RecepcionProveedore  $recepcionProveedore
     * @return \Illuminate\Http\Response
     */
    public function destroy(RecepcionProveedore $recepcionProveedore)
    {
        //
    }
}
