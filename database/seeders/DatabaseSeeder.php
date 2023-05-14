<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Reporter;
use App\Models\Type;
use App\Models\Project;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        User::truncate();
        Reporter::truncate();
        Type::truncate();
        Project::truncate();
        
        User::factory()->count(2)->create();
        Reporter::factory()->count(2)->create();
        Type::factory()->count(3)->create();
        Project::factory()->count(4)->create();
            
    }
}
