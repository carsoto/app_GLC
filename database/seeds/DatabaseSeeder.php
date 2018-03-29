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
        $this->call(ParentescosSeeder::class);
        $this->call(ModelosYateSeeder::class);
        $this->call(PuertosSeeder::class);
        $this->call(TiposPatenteSeeder::class);
    }
}
