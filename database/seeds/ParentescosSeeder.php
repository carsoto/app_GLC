<?php

use Illuminate\Database\Seeder;

class ParentescosSeeder extends Seeder
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
			0 => array('descripcion' => 'Abuelo/a', 'created_at' => date('Y-m-d H:i:s')),
			1 => array('descripcion' => 'Bisabuelo/a', 'created_at' => date('Y-m-d H:i:s')),
			2 => array('descripcion' => 'Cuñado/a', 'created_at' => date('Y-m-d H:i:s')),
			3 => array('descripcion' => 'Hermano/a', 'created_at' => date('Y-m-d H:i:s')),
			4 => array('descripcion' => 'Hijo/a', 'created_at' => date('Y-m-d H:i:s')),
			5 => array('descripcion' => 'Nieto/a', 'created_at' => date('Y-m-d H:i:s')),
			6 => array('descripcion' => 'Padrastro/Madrastra', 'created_at' => date('Y-m-d H:i:s')),
			7 => array('descripcion' => 'Padre/Madre', 'created_at' => date('Y-m-d H:i:s')),
			8 => array('descripcion' => 'Primo/a', 'created_at' => date('Y-m-d H:i:s')),
			9 => array('descripcion' => 'Sobrino/a', 'created_at' => date('Y-m-d H:i:s')),
			10 => array('descripcion' => 'Suegro/a', 'created_at' => date('Y-m-d H:i:s')),
			11 => array('descripcion' => 'Tío/a', 'created_at' => date('Y-m-d H:i:s')),
			12 => array('descripcion' => 'Yerno/Nuera', 'created_at' => date('Y-m-d H:i:s')),
			13 => array('descripcion' => 'Otro', 'created_at' => date('Y-m-d H:i:s'))
        );

		foreach (array_chunk($array_records, 1000) as $records) {
			\DB::table('parentescos')->insert($records);
		}
    }
}
