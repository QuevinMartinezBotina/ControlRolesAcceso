<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carnet extends Model
{
    use HasFactory;

    static $rules = [
        'numero' => 'required',
        'id_estado' => 'required',
    ];

    protected $perPage = 20;

    protected $fillable = ['numero', 'id_estado'];

    public function estado()
    {
        return $this->hasOne('App\Models\Estado', 'id', 'id_estado');
    }
}
