<?php

use Illuminate\Database\Seeder;
use \App\Models\IssueStatus;

class IssueStatusesTableSeeder extends Seeder
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
                'name' => 'To do',
            ],
            [
                'name' => 'In progress',
            ],
            [
                'name' => 'Done',
            ]
        ];
        foreach($roles as $role)
        {
            IssueStatus::create($role);
        }
    }
}
