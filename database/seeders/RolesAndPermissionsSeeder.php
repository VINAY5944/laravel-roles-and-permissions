<?php namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create permissions
        Permission::create(['name' => 'create leads']);
        Permission::create(['name' => 'view leads']);
        Permission::create(['name' => 'update leads']);
        Permission::create(['name' => 'delete leads']);
        Permission::create(['name' => 'create proposals']);
        Permission::create(['name' => 'view proposals']);
        Permission::create(['name' => 'update proposals']);
        Permission::create(['name' => 'delete proposals']);
        Permission::create(['name' => 'create estimates']);
        Permission::create(['name' => 'view estimates']);
        Permission::create(['name' => 'update estimates']);
        Permission::create(['name' => 'delete estimates']);
        Permission::create(['name' => 'create invoices']);
        Permission::create(['name' => 'view invoices']);
        Permission::create(['name' => 'update invoices']);
        Permission::create(['name' => 'delete invoices']);

        // Create roles and assign created permissions

        // Super Admin Role
        $role = Role::create(['name' => 'super-admin']);
        $role->givePermissionTo(Permission::all());

        // Admin Role
        $role = Role::create(['name' => 'admin']);
        $role->givePermissionTo([
            'create leads',
            'view leads',
            'update leads',
            'delete leads',
            'create proposals',
            'view proposals',
            'update proposals',
            'delete proposals',
            'create estimates',
            'view estimates',
            'update estimates',
            'delete estimates',
            'create invoices',
            'view invoices',
            'update invoices',
            'delete invoices',
        ]);

        // User Role
        $role = Role::create(['name' => 'user']);
        $role->givePermissionTo([
            'create leads',
            'view leads',
            'create proposals',
            'view proposals',
            'create estimates',
            'view estimates',
            'create invoices',
            'view invoices',
        ]);
    }
}
