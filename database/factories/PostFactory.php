<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Admin;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => substr($this->faker->text(30),0,-1),
            'description' => $this->faker->paragraphs(rand(5,7),true),
            'admin_id'=>Admin::all()->random()->id
        ];
    }
}
