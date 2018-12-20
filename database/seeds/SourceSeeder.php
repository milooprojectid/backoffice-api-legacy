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
        $sources = [
            [
                "name" => "detik",
                "alias" => "detik",
                "url" => "detik.com",
                "status" => 0
            ],
            [
                "name" => "okezone",
                "alias" => "okezone",
                "url" => "okezone.com",
                "status" => 0
            ],
            [
                "name" => "kumparan",
                "alias" => "kumparan",
                "url" => "kumparan.com",
                "status" => 0
            ],
            [
                "name" => "tribunnews",
                "alias" => "tribunnews",
                "url" => "tribunnews.com",
                "status" => 0
            ],
            [
                "name" => "liputan6",
                "alias" => "liputan6",
                "url" => "liputan6.com",
                "status" => 0
            ],
            [
                "name" => "viva",
                "alias" => "viva",
                "url" => "viva.co.id",
                "status" => 0
            ],
            [
                "name" => "republika",
                "alias" => "republika",
                "url" => "republika.co.id",
                "status" => 0
            ],
            [
                "name" => "tempo.co",
                "alias" => "tempo",
                "url" => "tempo.co",
                "status" => 0
            ],
            [
                "name" => "baca",
                "alias" => "baca",
                "url" => "berita.baca.co.id",
                "status" => 0
            ],
            [
                "name" => "sindonews",
                "alias" => "sindonews",
                "url" => "sindonews.com",
                "status" => 0
            ],
            [
                "name" => "cnn news",
                "alias" => "cnnindonesia",
                "url" => "cnnindonesia.com",
                "status" => 0
            ],
            [
                "name" => "bbc news indonesia",
                "alias" => "bbc",
                "url" => "bbc.com/indonesia",
                "status" => 0
            ],
            [
                "name" => "tirto",
                "alias" => "tirto",
                "url" => "tirto.id",
                "status" => 0
            ],
            [
                "name" => "kompasiana",
                "alias" => "kompasiana",
                "url" => "kompasiana.com",
                "status" => 0
            ],
            [
                "name" => "beritasatu",
                "alias" => "beritasatu",
                "url" => "beritasatu.com",
                "status" => 0
            ],
            [
                "name" => "jawapos",
                "alias" => "jawapos",
                "url" => "jawapos.com",
                "status" => 0
            ],
            [
                "name" => "antaranews",
                "alias" => "antaranews",
                "url" => "antaranews.com",
                "status" => 0
            ],
            [
                "name" => "katadata",
                "alias" => "katadata",
                "url" => "katadata.co.id",
                "status" => 0
            ],
            [
                "name" => "pikiran rakyat",
                "alias" => "pikiran-rakyat",
                "url" => "pikiran-rakyat.com",
                "status" => 0
            ]
        ];

        foreach ($sources as $source){
            Source::create($source);
        }
    }
}
