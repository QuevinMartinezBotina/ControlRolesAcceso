<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\User;
use Illuminate\Http\Request;


class AreaController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:ver-area|crear-area|editar-area|borrar-area', ['only' => ['index']]);
        $this->middleware('permission:crear-area', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-area', ['only' => ['edit', 'update']]);
        $this->middleware('permission:borrar-area', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $areas = Area::all();
        $users = User::all();

        return view('areas.index', compact('areas', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $area = Area::all();
        $users = User::all();

        return view('areas.create', compact('area', 'users'));
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
            'nom_area' => 'required',
            'id_user' => 'required',
        ]);

        Area::create($request->all());

        return redirect()->route('areas.create')->with('success', 'Area creada con exito!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function show(Area $area)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function edit(Area $area)
    {
        $users = User::all();
        return view('areas.edit', compact('area', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Area $area)
    {
        request()->validate([
            'nom_area' => 'required',
            'id_user' => 'required',
        ]);

        $area->update($request->all());

        return redirect()->route('areas.index')->with('success', 'Actualizado con exito!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function destroy(Area $area)
    {
        $area->delete();

        return redirect()->route('areas.index');
    }
}
