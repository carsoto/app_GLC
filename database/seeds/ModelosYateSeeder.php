<?php

use Illuminate\Database\Seeder;

class ModelosYateSeeder extends Seeder
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
			0 => array('descripcion' => 'Catamarán', 'created_at' => date('Y-m-d H:i:s')),
			1 => array('descripcion' => 'Motor', 'created_at' => date('Y-m-d H:i:s')),
			2 => array('descripcion' => 'Trimarán', 'created_at' => date('Y-m-d H:i:s')),
			3 => array('descripcion' => 'Monohull', 'created_at' => date('Y-m-d H:i:s')),
			4 => array('descripcion' => 'Vela', 'created_at' => date('Y-m-d H:i:s')),
        );

		foreach (array_chunk($array_records, 1000) as $records) {
			\DB::table('modelos_yate')->insert($records);
		}
    }
}
