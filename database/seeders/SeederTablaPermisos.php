<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

//Spatie encargado de permisos y roles
use Spatie\Permission\Models\Permission;

class SeederTablaPermisos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permisos = [
            //Tabla Roles
            'ver-rol',
            'crear-rol',
            'editar-rol',
            'borrar-rol',
            //Tabla blog
            'ver-blog',
            'crear-blog',
            'editar-blog',
            'borrar-blog',
        ];
        foreach ($permisos as $permiso) {
            Permission::create(['name' => $permiso]);
        }
    }
}
