<?php

use Illuminate\Database\Seeder;
use \App\Models\IssueType;

class IssueTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            [
                'name' => 'bug',
            ],
            [
                'name' => 'history',
            ],
        ];
        foreach($types as $type)
        {
            IssueType::create($type);
        }
    }
}
