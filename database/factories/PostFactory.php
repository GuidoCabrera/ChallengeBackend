<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->sentence();
        return [
            'titulo'=> $title,
            'slug' => Str::slug($title),
            'urlimagen'=> 'storage/images/imgxDefecto.jpg',
            'descripcion'=> $this->faker->paragraph()

        ];
    }
}
