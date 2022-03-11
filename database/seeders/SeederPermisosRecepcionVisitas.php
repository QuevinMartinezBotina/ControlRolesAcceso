<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;


class SeederPermisosRecepcionVisitas extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permisos = [
            //Tabla recepcion visitas
            'ver-recepcion-visita',
            /* 'crear-recepcion-visita', */
            'editar-recepcion-visita',
            'borrar-recepcion-visita',

        ];
        foreach ($permisos as $permiso) {
            Permission::create(['name' => $permiso]);
        }
    }
}
