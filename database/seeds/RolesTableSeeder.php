<?php

use Illuminate\Database\Seeder;
use \App\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'name' => 'Admin',
                'slug' => 'admin',
            ],
            [
                'name' => 'Project manager',
                'slug' => 'pm',
            ],
            [
                'name' => 'Staff',
                'slug' => 'staff',
            ]
        ];
        foreach($roles as $role)
        {
            Role::create($role);
        }
    }
}
