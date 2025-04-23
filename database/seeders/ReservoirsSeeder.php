<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReservoirsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reservoirs')->insert($this->getData());
    }

    protected function getData(): array 
    {
        $faker = Factory::create();

        $data = [];

        for ($i = 0; $i<2; $i++) {
            if($i ==0) {
                $data[] = [
                    // 'category_id' => 1,
                    // 'title' => $faker->sentence(mt_rand(3,10)),
                    // 'author' => $faker->firstName() . '-' . $faker->lastName(),
                    // 'description' => $faker->text(mt_rand(100,300))
                        'time_filling' => 0,
                        'time_leakage' => 0,
                        'max_volume'=> 1000,
                        'current_volume' => 1000, 
                ];
            } else {
                $data[] = [
                        'time_filling' => 0,
                        'time_leakage' => 0,
                        'max_volume'=> 500,
                        'current_volume' => 500, 
                ];
            }
        }

        return $data;
    }
}
