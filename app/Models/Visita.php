<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Documento;
use App\Models\Area;
use App\Models\Sede;
use League\CommonMark\Block\Element\Document;

class Visita extends Model
{
    use HasFactory;

    static $rules = [
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
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nom_visitante', 'num_documento', 'telefono', 'correo', 'nom_empresa', 'arl_empresa', 'motivo_visita', 'observaciones', 'fecha_programada', 'fecha_visita', 'placa', 'color', 'tipo', 'id_documento', 'id_area', 'id_sede'
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function documento()
    {
        return $this->hasOne(Documento::class, 'id', 'id_documento');
    }

    public function area()
    {
        return $this->hasOne(Area::class, 'id', 'id_area');
    }

    public function sede()
    {
        return $this->hasOne(Sede::class, 'id', 'id_sede');
    }
}
