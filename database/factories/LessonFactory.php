<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
// use App\Models\Lesson;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lesson>
 */
class LessonFactory extends Factory
{

    // protected $model = Lesson::class;
     /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        
        $name = fake()->unique()->name();

        return [
            'module_id' => fake()->uuid(),
            'name' => $name,
            'description' => fake()->paragraph(),
            'video' => fake()->unique()->url(),
            'url' => Str::slug($name),
        ];
    }
}
