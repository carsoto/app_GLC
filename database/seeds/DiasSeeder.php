<?php

use Illuminate\Database\Seeder;

class DiasSeeder extends Seeder
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
			0 => array('id' => '1', 'dia' => 'Lunes', 'created_at' => date('Y-m-d H:i:s')),
			1 => array('id' => '2', 'dia' => 'Martes', 'created_at' => date('Y-m-d H:i:s')),
			2 => array('id' => '3', 'dia' => 'Miércoles', 'created_at' => date('Y-m-d H:i:s')),
			3 => array('id' => '4', 'dia' => 'Jueves', 'created_at' => date('Y-m-d H:i:s')),
			4 => array('id' => '5', 'dia' => 'Viernes', 'created_at' => date('Y-m-d H:i:s')),
			5 => array('id' => '6', 'dia' => 'Sábado', 'created_at' => date('Y-m-d H:i:s')),
			6 => array('id' => '7', 'dia' => 'Domingo', 'created_at' => date('Y-m-d H:i:s')),
		);

		foreach (array_chunk($array_records, 1000) as $records) {
			\DB::table('dias')->insert($records);
		}
    }
}
