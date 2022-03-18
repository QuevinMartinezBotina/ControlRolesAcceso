<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Visita;
use App\Models\Estado;
use App\Models\Carnet;


class RecepcionVisitante extends Model
{
    use HasFactory;

    static $rules = [
        'observaciones' /* => 'required' */,
        'fecha_entrada' /* => 'required' */,
        'fecha_salida' /* => 'required' */,
        'observaciones_equipos' /* => 'required' */,
        'marca' /* => 'required' */,
        'serial' /* => 'required' */,
        'planta_porteria' /* => 'required' */, //este campo es para saber si el equipo se dejo en porteria o salio
        'id_visita' /* => 'required' */,
        'id_estado' /* => 'required' */,
        'id_carnet' /* => 'required' */,
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'observaciones',
        'fecha_entrada',
        'fecha_salida',
        'observaciones_equipos',
        'marca',
        'serial',
        'planta_porteria',
        'id_visita',
        'id_estado',
        'id_carnet',
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function visita()
    {
        return $this->hasOne(Visita::class, 'id', 'id_visita');
    }

    public function carnet()
    {
        return $this->hasOne(Carnet::class, 'id', 'id_carnet');
    }

    public function estado()
    {
        return $this->hasOne(Estado::class, 'id', 'id_estado');
    }
}
