<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;


class SeederPermisosProveedores extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permisos = [
            //Tabla cargos
            'ver-recepcion-proveedor',
            'crear-recepcion-proveedor',
            'editar-recepcion-proveedor',
            'editar-salida',
            'borrar-recepcion-proveedor',

        ];
        foreach ($permisos as $permiso) {
            Permission::create(['name' => $permiso]);
        }
    }
}
