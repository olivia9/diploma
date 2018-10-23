<?php

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Permission;
use App\Models\RolePermission;

class RolePermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRoleId = Role::where('slug', 'admin')->first()->id;
        $pmRoleId = Role::where('slug', 'pm')->first()->id;

        $rolePermissions = [
            [
                'role_id' => $adminRoleId,
                'permission_id' => Permission::where('name', 'user')->where('permission', 'view')->first()->id,
            ],
            [
                'role_id' => $adminRoleId,
                'permission_id' => Permission::where('name', 'user')->where('permission', 'manage')->first()->id,
            ],
            [
                'role_id' => $adminRoleId,
                'permission_id' => Permission::where('name', 'project')->where('permission', 'view')->first()->id,
            ],
            [
                'role_id' => $adminRoleId,
                'permission_id' => Permission::where('name', 'project')->where('permission', 'manage')->first()->id,
            ],
            [
                'role_id' => $adminRoleId,
                'permission_id' => Permission::where('name', 'analytics')->where('permission', 'view')->first()->id,
            ],
            [
                'role_id' => $adminRoleId,
                'permission_id' => Permission::where('name', 'sprint')->where('permission', 'view')->first()->id,
            ],
            //PM
            [
                'role_id' => $pmRoleId,
                'permission_id' => Permission::where('name', 'user')->where('permission', 'view')->first()->id,
            ],
            [
                'role_id' => $pmRoleId,
                'permission_id' => Permission::where('name', 'user')->where('permission', 'manage')->first()->id,
            ],
            [
                'role_id' => $pmRoleId,
                'permission_id' => Permission::where('name', 'project')->where('permission', 'view')->first()->id,
            ],
            [
                'role_id' => $pmRoleId,
                'permission_id' => Permission::where('name', 'sprint')->where('permission', 'view')->first()->id,
            ],
            [
                'role_id' => $pmRoleId,
                'permission_id' => Permission::where('name', 'sprint')->where('permission', 'manage')->first()->id,
            ],

        ];
       /* $permissions = [
            [
                'name' => 'user',
                'permission' => 'view',
            ],
            [
                'name' => 'user',
                'permission' => 'manage',
            ],
            [
                'name' => 'project',
                'permission' => 'view',
            ],
            [
                'name' => 'project',
                'permission' => 'manage',
            ],
            [
                'name' => 'analytics',
                'permission' => 'view',
            ],
            [
                'name' => 'sprint',
                'permission' => 'view',
            ],
            [
                'name' => 'sprint',
                'permission' => 'manage',
            ],
            [
                'name' => 'permission',
                'permission' => 'view',
            ],
            [
                'name' => 'permission',
                'permission' => 'manage',
            ],
        ];*/
      // $rolePermissions = [];

        foreach($rolePermissions as $rolePermission)
        {
            RolePermission::create($rolePermission);
        }

    }
}
