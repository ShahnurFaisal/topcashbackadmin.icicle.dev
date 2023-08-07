<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //create roles
        $adminRole = Role::where('name', 'admin')->first();
        $editorRole = Role::where('name', 'editor')->first();


        //Permissions
        $permissions = [
        //  role permission
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            // product permission
            'admin-list',
            'admin-create',
            'admin-edit',
            'admin-delete',
            // product permission
            'category-list',
            'category-create',
            'category-edit',
            'category-delete',
            // product permission
            'subCategory-list',
            'subCategory-create',
            'subCategory-edit',
            'subCategory-delete',
            // product permission
            'subCategory-list',
            'subCategory-create',
            'subCategory-edit',
            'subCategory-delete',
            // product permission
            'ChildCategory-list',
            'ChildCategory-create',
            'ChildCategory-edit',
            'ChildCategory-delete',
            // product permission
            'product-list',
            'product-create',
            'product-edit',
            'product-delete',
            // product permission
            'inventory-list',
            'inventory-create',
            'inventory-edit',
            'inventory-delete',
            // product permission
            'order-list',
            'order-create',
            'order-edit',
            'order-delete',
            // product permission
            'sideConfig-list',
            'sideConfig-create',
            'sideConfig-edit',
            'sideConfig-delete',
        ];

        // create and assign permission
        for ($i=0; $i< count($permissions); $i++){
            $permission = Permission::create(['name'=>$permissions[$i]]);
            $adminRole->givePermissionTo($permission);
            $permission->assignRole($adminRole);
        }
    }
}
