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

        $empleados = [
            Permission::create(['name' => 'ver-nomina']),
            Permission::create(['name' => 'ver-empleado']),
            Permission::create(['name' => 'crear-empleado']),
            Permission::create(['name' => 'editar-empleado']),
            Permission::create(['name' => 'borrar-empleado']),
            Permission::create(['name' => 'modificar-puesto']),
        ];

        $reporteContrataciones = [
            Permission::create(['name' => 'ver-reporte-contrataciones']),
        ];

        $roleAdministrador = Role::create(['name' => 'Administrador'])->givePermissionTo([
            $roles, $usuarios
        ]);

        //Rol estrategico
        $roleGerenteRecursosHumanos = Role::create(['name' => 'Gerente Recursos Humanos'])->givePermissionTo([
            
        ]);

        //Rol Tactico
        $roleAnalistaRecursosHumanos = Role::create(['name' => 'Analista Recursos Humanos'])->givePermissionTo([
            $reporteContrataciones
        ]);

        //Rol Operativo
        $roleJefeDeEquipo = Role::create(['name' => 'Jefe de Equipo'])->givePermissionTo([
            $empleados
        ]);

    }
}
