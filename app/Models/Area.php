<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Area extends Model
{

    static $rules = [
        'nom_area' => 'required',
        'id_user' => 'required',
    ];

    protected $perPage = 20;

    use HasFactory;

    protected $fillable = ['nom_area', 'id_user'];


    public function user()
    {
        return $this->hasOne(User::class, 'id', 'id_user');
    }
}
