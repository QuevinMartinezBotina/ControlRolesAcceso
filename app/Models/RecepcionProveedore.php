<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Estado;
use App\Models\Documento;


class RecepcionProveedore extends Model
{
    use HasFactory;

    static $rules = [
        'empresa_transportadora'/* => 'required'*/,
        'empresa_vendedora'/* => 'required'*/,
        'num_placa'/* => 'required'*/,
        'color'/* => 'required'*/,
        'tipo'/* => 'required'*/,
        'num_personas'/* => 'required'*/,
        'num_documento'/* => 'required'*/,
        'nombre'/* => 'required'*/,
        'observaciones'/* => 'required'*/,
        'fecha_entrada'/* => 'required'*/,
        'fecha_salida'/* => 'required'*/,

        'id_estado'/* => 'required'*/,
        'id_documento'/* => 'required'*/,
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'empresa_transportadora',
        'empresa_vendedora',
        'num_placa',
        'color',
        'tipo',
        'num_personas',
        'num_documento',
        'nombre',
        'observaciones',
        'fecha_entrada',
        'fecha_salida',

        'id_estado',
        'id_documento',
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */


    public function documento()
    {
        return $this->hasOne(Documento::class, 'id', 'id_documento');
    }

    public function estado()
    {
        return $this->hasOne(Estado::class, 'id', 'id_estado');
    }
}
