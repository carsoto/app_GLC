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
        $this->call(TiposEmbarcacionSeeder::class);
        $this->call(ModelosEmbarcacionSeeder::class);
        $this->call(PuertosSeeder::class);
        $this->call(TiposPatenteSeeder::class);
        $this->call(DiasSeeder::class);

    }
}
