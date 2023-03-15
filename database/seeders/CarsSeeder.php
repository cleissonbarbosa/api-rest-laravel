<?php

namespace Database\Seeders;

use App\Models\Car;
use Illuminate\Database\Seeder;

class CarsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Car::create([
            'name'     => 'Fiat Strada',
            'model'    => '4x4',
            'year'     => 2023,
            'plate' => 'CST1422'
        ]);

        Car::create([
            'name'     => 'Fiat Uno',
            'model'    => '1.0',
            'year'     => 1992,
            'plate' => 'WUT5422'
        ]);

        Car::create([
            'name'     => 'Jeep Compass',
            'model'    => '2.0',
            'year'     => 2023,
            'plate' => 'QUM5739'
        ]);

        Car::create([
            'name'     => 'Citroën C3',
            'model'    => '2.0',
            'year'     => 2021,
            'plate' => 'TFX7189'
        ]);
    }
}
