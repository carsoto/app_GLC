<?php

use Illuminate\Database\Seeder;

class IslasSeeder extends Seeder
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
			0 => array('nombre' => 'Bartolomé', 'created_at' => date('Y-m-d H:i:s')),
			1 => array('nombre' => 'Daphne Mayor', 'created_at' => date('Y-m-d H:i:s')),
			2 => array('nombre' => 'Española', 'created_at' => date('Y-m-d H:i:s')),
			3 => array('nombre' => 'Fernandina', 'created_at' => date('Y-m-d H:i:s')),
			4 => array('nombre' => 'Floreana', 'created_at' => date('Y-m-d H:i:s')),
			5 => array('nombre' => 'Genovesa', 'created_at' => date('Y-m-d H:i:s')),
			6 => array('nombre' => 'Isabela', 'created_at' => date('Y-m-d H:i:s')),
			7 => array('nombre' => 'Mosquera', 'created_at' => date('Y-m-d H:i:s')),
			8 => array('nombre' => 'Plazas', 'created_at' => date('Y-m-d H:i:s')),
			9 => array('nombre' => 'Rábida', 'created_at' => date('Y-m-d H:i:s')),
			10 => array('nombre' => 'San Cristóbal', 'created_at' => date('Y-m-d H:i:s')),
			11 => array('nombre' => 'Santa Cruz', 'created_at' => date('Y-m-d H:i:s')),
			12 => array('nombre' => 'Santa Fé', 'created_at' => date('Y-m-d H:i:s')),
			13 => array('nombre' => 'Santiago', 'created_at' => date('Y-m-d H:i:s')),
			14 => array('nombre' => 'Seymour Norte', 'created_at' => date('Y-m-d H:i:s')),
			15 => array('nombre' => 'Baltra', 'created_at' => date('Y-m-d H:i:s')),
			16 => array('nombre' => 'Daphne Menor', 'created_at' => date('Y-m-d H:i:s')),
			17 => array('nombre' => 'Darwin', 'created_at' => date('Y-m-d H:i:s')),
			18 => array('nombre' => 'Marchena', 'created_at' => date('Y-m-d H:i:s')),
			19 => array('nombre' => 'Pinta', 'created_at' => date('Y-m-d H:i:s')),
			20 => array('nombre' => 'Pinzón', 'created_at' => date('Y-m-d H:i:s')),
			21 => array('nombre' => 'Wolf', 'created_at' => date('Y-m-d H:i:s')),
			22 => array('nombre' => 'Sin isla', 'created_at' => date('Y-m-d H:i:s')),
        );

		foreach (array_chunk($array_records, 1000) as $records) {
			\DB::table('islas')->insert($records);
		}
    }
}
