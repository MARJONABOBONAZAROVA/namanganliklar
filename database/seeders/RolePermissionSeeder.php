<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Permission::create(['name'=>'create post']);
        Permission::create(['name'=>'edit post']);
        Permission::create(['name'=>'delete post']);
        Permission::create(['name'=>'create category']);
        Permission::create(['name'=>'edit  category']);
        Permission::create(['name'=>'delete category']);



        $role = Role::create(['name' => 'SuperAdmin']);
        $role->givePermissionTo(Permission::all());

       $role = Role::create(['name' => 'Admin']);
       $role->givePermissionTo([3,6]);
       $role =Role::create(['name' => 'Writer']);
       $role->givePermissionTo([1,2,4,5]);
    }

}
