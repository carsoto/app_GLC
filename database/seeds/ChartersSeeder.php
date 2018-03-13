<?php

use Illuminate\Database\Seeder;

class ChartersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Charters::class, 100)->create();
    }
}
