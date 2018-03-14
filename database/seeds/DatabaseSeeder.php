<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(ChartersSeeder::class);
        $this->call(TipoEmbarcacionSeeder::class);
    }
}
