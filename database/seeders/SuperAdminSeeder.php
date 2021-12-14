<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

//Modelos
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //?Esto es para crear super user antes de entrar al sistema
        /* $usuario = User::create([
            'name' => 'Wilmar Lopera Correa',
            'email' => 'wilmarlopera@gmail.com',
            'password' => bcrypt('123456')
        ]);

        $rol = Role::create(['name' => 'Administrador']);

        $permisos = Permission::pluck('id', 'id')->all();

        $rol->synPermissions($permisos);

        $usuario->assignRole(['Administrador'); */
    }
}
