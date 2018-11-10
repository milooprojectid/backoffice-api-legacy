<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use App\Models\Source;

class SourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $sources = ["detik"
            ,"babe"
            ,"okezone"
            ,"kompas"
            ,"kumparan"
            ,"tribunnews"
            ,"liputan6"
            ,"metrotvnews"
            ,"flipboard"
            ,"viva"
            ,"republikaonline"
            ,"tempo.co"
            ,"baca apps"
            ,"sindonews"
            ,"cnn news"
            ,"kurio"
            ,"bbcnews"
            ,"tirto.id"
            ,"kompasiana"
            ,"beritasatu"
            ,"antaranews"
            ,"merdeka"
            ,"wartaekonomi"
            ,"jawapos"
            ,"katadata"
            ,"pikiran-rakyat"];

//        $faker = Factory::create();
        foreach ($sources as $source){
            Source::create([
                "name" => $source,
			    "alias" => $source,
			    "url" => "http://" . $source . ".id"
            ]);
        }
    }
}
