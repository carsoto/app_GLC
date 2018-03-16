<?php

use Illuminate\Database\Seeder;

class EmbarcacionSeeder extends Seeder
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
			1 => array('nombre_embarcacion' => 'Anahi', 'cant_pasajeros' => 15, 'tipo_embarcacion_id' => 1, 'created_at' => date('Y-m-d H:i:s')),
			2 => array('nombre_embarcacion' => 'Athala', 'cant_pasajeros' => 30, 'tipo_embarcacion_id' => 2, 'created_at' => date('Y-m-d H:i:s')),
			3 => array('nombre_embarcacion' => 'Cormorant', 'cant_pasajeros' => 25, 'tipo_embarcacion_id' => 1, 'created_at' => date('Y-m-d H:i:s')),
			4 => array('nombre_embarcacion' => 'Eclipse', 'cant_pasajeros' => 10, 'tipo_embarcacion_id' => 1, 'created_at' => date('Y-m-d H:i:s')),
			5 => array('nombre_embarcacion' => 'Evolution', 'cant_pasajeros' => 40, 'tipo_embarcacion_id' => 2, 'created_at' => date('Y-m-d H:i:s')),
			6 => array('nombre_embarcacion' => 'GalaxyII', 'cant_pasajeros' => 150, 'tipo_embarcacion_id' => 1, 'created_at' => date('Y-m-d H:i:s')),
			7 => array('nombre_embarcacion' => 'Grace', 'cant_pasajeros' => 14, 'tipo_embarcacion_id' => 1, 'created_at' => date('Y-m-d H:i:s')),
			8 => array('nombre_embarcacion' => 'Grand-Odyssey', 'cant_pasajeros' => 56, 'tipo_embarcacion_id' => 1, 'created_at' => date('Y-m-d H:i:s')),
			9 => array('nombre_embarcacion' => 'Integrity', 'cant_pasajeros' => 25, 'tipo_embarcacion_id' => 1, 'created_at' => date('Y-m-d H:i:s')),
			10 => array('nombre_embarcacion' => 'La-Pinta', 'cant_pasajeros' => 82, 'tipo_embarcacion_id' => 1, 'created_at' => date('Y-m-d H:i:s')),
			11 => array('nombre_embarcacion' => 'Majestic', 'cant_pasajeros' => 15, 'tipo_embarcacion_id' => 2, 'created_at' => date('Y-m-d H:i:s')),
			12 => array('nombre_embarcacion' => 'Ocean-Spray', 'cant_pasajeros' => 25, 'tipo_embarcacion_id' => 2, 'created_at' => date('Y-m-d H:i:s')),
			13 => array('nombre_embarcacion' => 'Passion', 'cant_pasajeros' => 63, 'tipo_embarcacion_id' => 2, 'created_at' => date('Y-m-d H:i:s')),
			14 => array('nombre_embarcacion' => 'Petrel', 'cant_pasajeros' => 15, 'tipo_embarcacion_id' => 1, 'created_at' => date('Y-m-d H:i:s')),
			15 => array('nombre_embarcacion' => 'Queen-Beatriz', 'cant_pasajeros' => 15, 'tipo_embarcacion_id' => 1, 'created_at' => date('Y-m-d H:i:s')),
			16 => array('nombre_embarcacion' => 'Queen-of-Galapagos', 'cant_pasajeros' => 15, 'tipo_embarcacion_id' => 1, 'created_at' => date('Y-m-d H:i:s')),
			17 => array('nombre_embarcacion' => 'Seaman', 'cant_pasajeros' => 15, 'tipo_embarcacion_id' => 1, 'created_at' => date('Y-m-d H:i:s')),
			18 => array('nombre_embarcacion' => 'Treasure-of-Galapagos', 'cant_pasajeros' => 57, 'tipo_embarcacion_id' => 1, 'created_at' => date('Y-m-d H:i:s')),
			19 => array('nombre_embarcacion' => 'Stella-Maris', 'cant_pasajeros' => 15, 'tipo_embarcacion_id' => 1, 'created_at' => date('Y-m-d H:i:s')),
			20 => array('nombre_embarcacion' => 'Tip-Top-II', 'cant_pasajeros' => 24, 'tipo_embarcacion_id' => 2, 'created_at' => date('Y-m-d H:i:s')),
			21 => array('nombre_embarcacion' => 'Infinity', 'cant_pasajeros' => 78, 'tipo_embarcacion_id' => 2, 'created_at' => date('Y-m-d H:i:s')),
			22 => array('nombre_embarcacion' => 'Natural-Paradise', 'cant_pasajeros' => 87, 'tipo_embarcacion_id' => 2, 'created_at' => date('Y-m-d H:i:s')),
			23 => array('nombre_embarcacion' => 'Origin', 'cant_pasajeros' => 78, 'tipo_embarcacion_id' => 1, 'created_at' => date('Y-m-d H:i:s')),
			24 => array('nombre_embarcacion' => 'Sea-Star-Journey', 'cant_pasajeros' => 15, 'tipo_embarcacion_id' => 1, 'created_at' => date('Y-m-d H:i:s')),
			25 => array('nombre_embarcacion' => 'Santa-Cruz-II', 'cant_pasajeros' => 15, 'tipo_embarcacion_id' => 1, 'created_at' => date('Y-m-d H:i:s')),
			26 => array('nombre_embarcacion' => 'Marchena', 'cant_pasajeros' => 545, 'tipo_embarcacion_id' => 2, 'created_at' => date('Y-m-d H:i:s')),
			27 => array('nombre_embarcacion' => 'San-Cristobal', 'cant_pasajeros' => 15, 'tipo_embarcacion_id' => 2, 'created_at' => date('Y-m-d H:i:s')),
			28 => array('nombre_embarcacion' => 'Santa-Cruz', 'cant_pasajeros' => 453, 'tipo_embarcacion_id' => 2, 'created_at' => date('Y-m-d H:i:s')),
			29 => array('nombre_embarcacion' => 'Isabela', 'cant_pasajeros' => 15, 'tipo_embarcacion_id' => 1, 'created_at' => date('Y-m-d H:i:s')),
			30 => array('nombre_embarcacion' => 'Floreana', 'cant_pasajeros' => 45, 'tipo_embarcacion_id' => 1, 'created_at' => date('Y-m-d H:i:s')),
			31 => array('nombre_embarcacion' => 'Espanola', 'cant_pasajeros' => 54, 'tipo_embarcacion_id' => 1, 'created_at' => date('Y-m-d H:i:s')),
			32 => array('nombre_embarcacion' => 'Bartolome', 'cant_pasajeros' => 15, 'tipo_embarcacion_id' => 1, 'created_at' => date('Y-m-d H:i:s')),
			33 => array('nombre_embarcacion' => 'Fernandina', 'cant_pasajeros' => 15, 'tipo_embarcacion_id' => 1, 'created_at' => date('Y-m-d H:i:s')),
			34 => array('nombre_embarcacion' => 'North-Seymour', 'cant_pasajeros' => 15, 'tipo_embarcacion_id' => 1, 'created_at' => date('Y-m-d H:i:s')),
			35 => array('nombre_embarcacion' => 'Genovesa', 'cant_pasajeros' => 15, 'tipo_embarcacion_id' => 1, 'created_at' => date('Y-m-d H:i:s')),
			36 => array('nombre_embarcacion' => 'Pinzon', 'cant_pasajeros' => 15, 'tipo_embarcacion_id' => 2, 'created_at' => date('Y-m-d H:i:s')),
			37 => array('nombre_embarcacion' => 'Pinta', 'cant_pasajeros' => 15, 'tipo_embarcacion_id' => 2, 'created_at' => date('Y-m-d H:i:s')),
			38 => array('nombre_embarcacion' => 'Santiago', 'cant_pasajeros' => 15, 'tipo_embarcacion_id' => 1, 'created_at' => date('Y-m-d H:i:s')),
			39 => array('nombre_embarcacion' => 'Rabida', 'cant_pasajeros' => 15, 'tipo_embarcacion_id' => 1, 'created_at' => date('Y-m-d H:i:s')),
			40 => array('nombre_embarcacion' => 'South-Plazas', 'cant_pasajeros' => 15, 'tipo_embarcacion_id' => 1, 'created_at' => date('Y-m-d H:i:s')),
			41 => array('nombre_embarcacion' => 'Baltra', 'cant_pasajeros' => 15, 'tipo_embarcacion_id' => 1, 'created_at' => date('Y-m-d H:i:s')),
			42 => array('nombre_embarcacion' => 'Daphne', 'cant_pasajeros' => 15, 'tipo_embarcacion_id' => 2, 'created_at' => date('Y-m-d H:i:s')),
			43 => array('nombre_embarcacion' => 'Wolf', 'cant_pasajeros' => 15, 'tipo_embarcacion_id' => 2, 'created_at' => date('Y-m-d H:i:s')),
			44 => array('nombre_embarcacion' => 'Darwin', 'cant_pasajeros' => 15, 'tipo_embarcacion_id' => 1, 'created_at' => date('Y-m-d H:i:s')),
			45 => array('nombre_embarcacion' => 'Santa-Fe', 'cant_pasajeros' => 15, 'tipo_embarcacion_id' => 2, 'created_at' => date('Y-m-d H:i:s')),
        );

		foreach (array_chunk($array_records, 1000) as $records) {
			\DB::table('embarcacion')->insert($records);
		}
    }
}
