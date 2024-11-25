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
            //Tabla blogs
            /* 'ver-blog',
            'crear-blog',
            'editar-blog',
            'borrar-blog', */
            //Tabla usuarios
            'ver-usuario',
            'crear-usuario',
            'editar-usuario',
            'borrar-usuario',
            //Tabla documentos
            'ver-documento',
            'crear-documento',
            'editar-documento',
            'borrar-documento',
            //Tabla estados
            'ver-estado',
            'crear-estado',
            'editar-estado',
            'borrar-estado',
            //Tabla sedes
            'ver-sede',
            'crear-sede',
            'editar-sede',
            'borrar-sede',
        ];
        foreach ($permisos as $permiso) {
            Permission::create(['name' => $permiso]);
        }
    }
}
