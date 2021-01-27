<?php

namespace Database\Factories;

use App\Models\Keuangan;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class KeuanganFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Keuangan::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $data = ['Event', 'Mingguan'];
        return [
            'region_id' => rand(1, 3),
            'email'     => $this->faker->email,
            'nama'      => $this->faker->name,
            'jumlah'    => rand(1, 10000000),
            'kategori'  => $data[array_rand($data)]
        ];
    }
}
