<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
//spatie
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class SeederTablaPermisos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $roles = [
            Permission::create(['name' => 'ver-rol']),
            Permission::create(['name' => 'crear-rol']),
            Permission::create(['name' => 'editar-rol']),
            Permission::create(['name' => 'borrar-rol']),
        ];

        $usuarios = [
            Permission::create(['name' => 'ver-usuario']),
            Permission::create(['name' => 'crear-usuario']),
            Permission::create(['name' => 'editar-usuario']),
            Permission::create(['name' => 'borrar-usuario']),
        ];

        $roleAdministrador = Role::create(['name' => 'Administrador'])->givePermissionTo([
            $roles, $usuarios
        ]);

        //Rol estrategico
        $roleGerenteRecursosHumanos = Role::create(['name' => 'Gerente Recursos Humanos'])->givePermissionTo([
            
        ]);

        //Rol Tactico
        $roleAnalistaRecursosHumanos = Role::create(['name' => 'Analista Recursos Humanos'])->givePermissionTo([
            
        ]);

        //Rol Operativo
        $roleJefeDeEquipo = Role::create(['name' => 'Jefe de Equipo'])->givePermissionTo([
            
        ]);

    }
}
