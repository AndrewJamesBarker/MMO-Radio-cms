<?php

namespace Database\Factories;

use App\Models\Producer;
use App\Models\Segment;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Script>
 */
class ScriptFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'script_audio_src' => $this->faker->sentence,
            'chat_script' => $this->faker->paragraph,
            'script_approved' => $this->faker->sentence,
            'approval_date' => now(),
            'producer_id' => Producer::all()->random(),
            'segment_id' => Segment::all()->random(),
        ]; 
    }
}
