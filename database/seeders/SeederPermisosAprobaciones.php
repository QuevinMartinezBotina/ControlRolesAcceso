<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;


class SeederPermisosAprobaciones extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permisos = [
            //Tabla aprobaciones

            'ver-aprobacion',
            'aprobacion-volver',
            'aprobacion-aprobar',
            'aprobacion-denegar',
            'aprobacion-ver-aprobados',
            'aprobacion-ver-desaprobados ',
            'aprobacion-ver-por-aprobar',


        ];
        foreach ($permisos as $permiso) {
            Permission::create(['name' => $permiso]);
        }
    }
}
