<?php

namespace Database\Factories;

use App\Models\Reporter;
use App\Models\InternalSystem;
use App\Models\SegmentType;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Segment>
 */
class SegmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'segment_data' => $this->faker->paragraph,
            'reporter_id' => Reporter::all()->random(),
            'internal_system_id' => InternalSystem::all()->random(),
            'segment_type_id' => SegmentType::all()->random(),
        ]; 
    }
}
