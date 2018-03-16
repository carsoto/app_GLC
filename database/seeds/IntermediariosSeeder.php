<?php

use Illuminate\Database\Seeder;

class IntermediariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        set_time_limit(0);

		$array_records = array (
			0 => array('nombre' => 'Aryel Dvorquez', 'email' => 'aryel@galapagosluxurycharters.com', 'created_at' => date('Y-m-d H:i:s')),
			1 => array('nombre' => 'Stephanie Saman', 'email' => 'stephanie@galapagosluxurycharters.com', 'created_at' => date('Y-m-d H:i:s')),
        );

		foreach (array_chunk($array_records, 1000) as $records) {
			\DB::table('intermediarios')->insert($records);
		}
    }
}
