<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use App\Models\Raw;

class RawSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        for ($i = 0; $i < 100; $i++){
            Raw::create([
                "source" => "detik",
			    "content" => $faker->paragraph,
			    "status" => 0 || 1
            ]);
        }
    }
}
