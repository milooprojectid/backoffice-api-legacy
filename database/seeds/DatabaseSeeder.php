<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(LinkSeeder::class);
        $this->call(SourceSeeder::class);
        $this->call(RawSeeder::class);
        $this->call(ConfSeeder::class);
    }
}
