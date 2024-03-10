<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Mensaje;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<Mensaje>
 */
class MensajeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // create a 128x128 random image in base64 format
        $image = base64_encode(file_get_contents($this->faker->image()));

        return [
            'mensaje' => $this->faker->text(),
            'user_id' => 1,
            'imagen' => $image,
        ];
    }

    /**
     * Allows to set the user_id attribute
     */
    public function user(int $id): self
    {
        return $this->state(fn(array $attributes) => ['user_id' => $id]);
    }

}
