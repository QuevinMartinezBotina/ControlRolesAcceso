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

            'aprobacion-aprobar',
            'aprobacion-denegar',
            'ver-aprobacion',
            'aprobacion-aprobados',
            'aprobacion-desaprobador',
            'aprobacion-por-aprobar',


        ];
        foreach ($permisos as $permiso) {
            Permission::create(['name' => $permiso]);
        }
    }
}
