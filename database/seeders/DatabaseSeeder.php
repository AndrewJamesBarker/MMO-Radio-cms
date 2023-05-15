<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Reporter;
use App\Models\Producer;
use App\Models\Type;
use App\Models\SegmentType;
use App\Models\SubSegmentType;
use App\Models\SegmentField;
use App\Models\InternalSystem;
use App\Models\Project;
use App\Models\Segment;
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
        Producer::truncate();
        Type::truncate();
        SegmentType::truncate();
        SubSegmentType::truncate();
        SegmentField::truncate();
        InternalSystem::truncate();
        Project::truncate();
        Segment::truncate();
        
        User::factory()->count(2)->create();
        Reporter::factory()->count(2)->create();
        Producer::factory()->count(2)->create();
        Type::factory()->count(3)->create();
        SegmentType::factory()->count(3)->create();
        SubSegmentType::factory()->count(3)->create();
        SegmentField::factory()->count(3)->create();
        InternalSystem::factory()->count(3)->create();
        Project::factory()->count(4)->create();
        Segment::factory()->count(4)->create();
            
    }
}
