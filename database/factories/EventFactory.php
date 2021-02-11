<?php

namespace Database\Factories;

use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class EventFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Event::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'judul'     => $this->faker->title,
            'tanggal'   => date('Y-m-d H:i:s'),
            'kategori'  => 'Semua Bisa',
            'content'   => $this->faker->text($maxNbChars = 200),
            'slug'     => 's-s-d'
        ];
    }
}
