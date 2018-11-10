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
        for ($i = 0; $i < 100; $i++){
            Link::create([
                "url" => $faker->url,
                "source" => "detik",
                "status" => 0,
                "visited_at" => null
            ]);
        }
    }

}
