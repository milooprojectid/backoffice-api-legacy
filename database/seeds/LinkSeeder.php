<?php

use Illuminate\Database\Seeder;
use App\models\Link;
use Faker\Factory;

class LinkSeeder extends Seeder
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
                Link::create([
                    "url" => $faker->url,
                    "source" => $source,
                    "status" => 10,
                ]);
            }
        }
    }

}
