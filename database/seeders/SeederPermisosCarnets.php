<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

//Spatie encargado de permisos y roles
use Spatie\Permission\Models\Permission;

class SeederPermisosCarnets extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permisos = [
            //Tabla Carnets
            'ver-carnet',
            'crear-carnet',
            'editar-carnet',
            'borrar-carnet',

        ];
        foreach ($permisos as $permiso) {
            Permission::create(['name' => $permiso]);
        }
    }
}
