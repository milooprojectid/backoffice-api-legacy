<?php

use Illuminate\Database\Seeder;
use App\Models\Conf;

class ConfSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Conf::create(['key' => 'crawler', 'value' => '1']);
        Conf::create(['key' => 'scrapper', 'value' => '1']);
        Conf::create(['key' => 'crawler_max_job', 'value' => '10']);
        Conf::create(['key' => 'scrapper_max_job', 'value' => '10']);
    }
}
