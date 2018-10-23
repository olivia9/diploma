<?php

use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
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
        ];
        foreach($permissions as $permission)
        {
            Permission::create($permission);
        }
    }
}
