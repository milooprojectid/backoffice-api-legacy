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
        $sources = ['detik', 'kompas', 'cnn', 'kumparan', 'viva'];
        foreach ($sources as $source){
            for ($i = 0; $i < 25; $i++){
                Raw::create([
                    "source" => $source,
                    "content" => $faker->randomHtml(),
                    "status" => 10
                ]);
            }
        }
    }
}
