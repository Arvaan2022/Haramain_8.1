<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'view-category']);
        Permission::create(['name' => 'edit-sub-category']);

        Permission::create(['name' => 'view-category']);
        Permission::create(['name' => 'edit-sub-category']);

        Permission::create(['name' => 'view-nabawi']);
        Permission::create(['name' => 'view-haram']);
  
        $adminRole = Role::create(['name' => 'Admin']);
        $editorRole = Role::create(['name' => 'SubAdmin']);

        $adminRole->givePermissionTo([
            'view-category',
            'edit-sub-category',
            'view-category',
            'edit-sub-category',
            'view-nabawi',
            'view-haram',
        ]);

        $editorRole->givePermissionTo([
            'view-category',
            'edit-sub-category',
            'view-category',
            'edit-sub-category',
            'view-nabawi',
            'view-haram',
        ]);
    }
}
