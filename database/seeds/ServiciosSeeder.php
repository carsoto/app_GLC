<?php

use Illuminate\Database\Seeder;

class ServiciosSeeder extends Seeder
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
				0 => array('descripcion' => 'Recreación', 'created_at' => date('Y-m-d H:i:s')),
				
	        );

			foreach (array_chunk($array_records, 1000) as $records) {
				\DB::table('servicios')->insert($records);
			}
    }
}
