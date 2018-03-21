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
			1 => array('tipo_embarcacion_id' => 1, 'nombre_embarcacion' => 'Anahi', 'cant_pasajeros' => 25, 'created_at' => date('Y-m-d H:i:s')),
			2 => array('tipo_embarcacion_id' => 2, 'nombre_embarcacion' => 'Athala', 'cant_pasajeros' => 45, 'created_at' => date('Y-m-d H:i:s')),
			3 => array('tipo_embarcacion_id' => 1, 'nombre_embarcacion' => 'Cormorant', 'cant_pasajeros' => 10, 'created_at' => date('Y-m-d H:i:s')),
			4 => array('tipo_embarcacion_id' => 2, 'nombre_embarcacion' => 'Eclipse', 'cant_pasajeros' => 5, 'created_at' => date('Y-m-d H:i:s')),
			5 => array('tipo_embarcacion_id' => 1, 'nombre_embarcacion' => 'Evolution', 'cant_pasajeros' => 20, 'created_at' => date('Y-m-d H:i:s')),
			6 => array('tipo_embarcacion_id' => 2, 'nombre_embarcacion' => 'GalaxyII', 'cant_pasajeros' => 35, 'created_at' => date('Y-m-d H:i:s')),
			7 => array('tipo_embarcacion_id' => 1, 'nombre_embarcacion' => 'Grace', 'cant_pasajeros' => 30, 'created_at' => date('Y-m-d H:i:s')),
			8 => array('tipo_embarcacion_id' => 2, 'nombre_embarcacion' => 'Grand-Odyssey', 'cant_pasajeros' => 40, 'created_at' => date('Y-m-d H:i:s')),
			9 => array('tipo_embarcacion_id' => 1, 'nombre_embarcacion' => 'Integrity', 'cant_pasajeros' => 50, 'created_at' => date('Y-m-d H:i:s')),
			10 => array('tipo_embarcacion_id' => 2, 'nombre_embarcacion' => 'La-Pinta', 'cant_pasajeros' => 15, 'created_at' => date('Y-m-d H:i:s')),
			11 => array('tipo_embarcacion_id' => 1, 'nombre_embarcacion' => 'Majestic', 'cant_pasajeros' => 20, 'created_at' => date('Y-m-d H:i:s')),
			12 => array('tipo_embarcacion_id' => 2, 'nombre_embarcacion' => 'Ocean-Spray', 'cant_pasajeros' => 30, 'created_at' => date('Y-m-d H:i:s')),
			13 => array('tipo_embarcacion_id' => 1, 'nombre_embarcacion' => 'Passion', 'cant_pasajeros' => 50, 'created_at' => date('Y-m-d H:i:s')),
			14 => array('tipo_embarcacion_id' => 2, 'nombre_embarcacion' => 'Petrel', 'cant_pasajeros' => 20, 'created_at' => date('Y-m-d H:i:s')),
			15 => array('tipo_embarcacion_id' => 1, 'nombre_embarcacion' => 'Queen-Beatriz', 'cant_pasajeros' => 35, 'created_at' => date('Y-m-d H:i:s')),
			16 => array('tipo_embarcacion_id' => 2, 'nombre_embarcacion' => 'Queen-of-Galapagos', 'cant_pasajeros' => 40, 'created_at' => date('Y-m-d H:i:s')),
			17 => array('tipo_embarcacion_id' => 1, 'nombre_embarcacion' => 'Seaman', 'cant_pasajeros' => 25, 'created_at' => date('Y-m-d H:i:s')),
			18 => array('tipo_embarcacion_id' => 2, 'nombre_embarcacion' => 'Treasure-of-Galapagos', 'cant_pasajeros' => 20, 'created_at' => date('Y-m-d H:i:s')),
			19 => array('tipo_embarcacion_id' => 1, 'nombre_embarcacion' => 'Stella-Maris', 'cant_pasajeros' => 22, 'created_at' => date('Y-m-d H:i:s')),
			20 => array('tipo_embarcacion_id' => 2, 'nombre_embarcacion' => 'Tip-Top-II', 'cant_pasajeros' => 20, 'created_at' => date('Y-m-d H:i:s')),
			21 => array('tipo_embarcacion_id' => 1, 'nombre_embarcacion' => 'Infinity', 'cant_pasajeros' => 35, 'created_at' => date('Y-m-d H:i:s')),
			22 => array('tipo_embarcacion_id' => 2, 'nombre_embarcacion' => 'Natural-Paradise', 'cant_pasajeros' => 30, 'created_at' => date('Y-m-d H:i:s')),
			23 => array('tipo_embarcacion_id' => 1, 'nombre_embarcacion' => 'Origin', 'cant_pasajeros' => 10, 'created_at' => date('Y-m-d H:i:s')),
			24 => array('tipo_embarcacion_id' => 2, 'nombre_embarcacion' => 'Sea-Star-Journey', 'cant_pasajeros' => 20, 'created_at' => date('Y-m-d H:i:s')),
			25 => array('tipo_embarcacion_id' => 1, 'nombre_embarcacion' => 'Santa-Cruz-II', 'cant_pasajeros' => 25, 'created_at' => date('Y-m-d H:i:s')),
			26 => array('tipo_embarcacion_id' => 2, 'nombre_embarcacion' => 'Marchena', 'cant_pasajeros' => 25, 'created_at' => date('Y-m-d H:i:s')),
			27 => array('tipo_embarcacion_id' => 1, 'nombre_embarcacion' => 'San-Cristobal', 'cant_pasajeros' => 50, 'created_at' => date('Y-m-d H:i:s')),
			28 => array('tipo_embarcacion_id' => 2, 'nombre_embarcacion' => 'Santa-Cruz', 'cant_pasajeros' => 45, 'created_at' => date('Y-m-d H:i:s')),
			29 => array('tipo_embarcacion_id' => 1, 'nombre_embarcacion' => 'Isabela', 'cant_pasajeros' => 40, 'created_at' => date('Y-m-d H:i:s')),
			30 => array('tipo_embarcacion_id' => 2, 'nombre_embarcacion' => 'Floreana', 'cant_pasajeros' => 50, 'created_at' => date('Y-m-d H:i:s')),
			31 => array('tipo_embarcacion_id' => 1, 'nombre_embarcacion' => 'Espanola', 'cant_pasajeros' => 20, 'created_at' => date('Y-m-d H:i:s')),
			32 => array('tipo_embarcacion_id' => 2, 'nombre_embarcacion' => 'Bartolome', 'cant_pasajeros' => 25, 'created_at' => date('Y-m-d H:i:s')),
			33 => array('tipo_embarcacion_id' => 1, 'nombre_embarcacion' => 'Fernandina', 'cant_pasajeros' => 35, 'created_at' => date('Y-m-d H:i:s')),
			34 => array('tipo_embarcacion_id' => 2, 'nombre_embarcacion' => 'North-Seymour', 'cant_pasajeros' => 15, 'created_at' => date('Y-m-d H:i:s')),
			35 => array('tipo_embarcacion_id' => 1, 'nombre_embarcacion' => 'Genovesa', 'cant_pasajeros' => 20, 'created_at' => date('Y-m-d H:i:s')),
			36 => array('tipo_embarcacion_id' => 2, 'nombre_embarcacion' => 'Pinzon', 'cant_pasajeros' => 35, 'created_at' => date('Y-m-d H:i:s')),
			37 => array('tipo_embarcacion_id' => 1, 'nombre_embarcacion' => 'Pinta', 'cant_pasajeros' => 18, 'created_at' => date('Y-m-d H:i:s')),
			38 => array('tipo_embarcacion_id' => 2, 'nombre_embarcacion' => 'Santiago', 'cant_pasajeros' => 14, 'created_at' => date('Y-m-d H:i:s')),
			39 => array('tipo_embarcacion_id' => 1, 'nombre_embarcacion' => 'Rabida', 'cant_pasajeros' => 17, 'created_at' => date('Y-m-d H:i:s')),
			40 => array('tipo_embarcacion_id' => 2, 'nombre_embarcacion' => 'South-Plazas', 'cant_pasajeros' => 20, 'created_at' => date('Y-m-d H:i:s')),
			41 => array('tipo_embarcacion_id' => 1, 'nombre_embarcacion' => 'Baltra', 'cant_pasajeros' => 22, 'created_at' => date('Y-m-d H:i:s')),
			42 => array('tipo_embarcacion_id' => 2, 'nombre_embarcacion' => 'Daphne', 'cant_pasajeros' => 28, 'created_at' => date('Y-m-d H:i:s')),
			43 => array('tipo_embarcacion_id' => 1, 'nombre_embarcacion' => 'Wolf', 'cant_pasajeros' => 30, 'created_at' => date('Y-m-d H:i:s')),
			44 => array('tipo_embarcacion_id' => 2, 'nombre_embarcacion' => 'Darwin', 'cant_pasajeros' => 50, 'created_at' => date('Y-m-d H:i:s')),
			45 => array('tipo_embarcacion_id' => 1, 'nombre_embarcacion' => 'Santa-Fe', 'cant_pasajeros' => 55, 'created_at' => date('Y-m-d H:i:s'))	
        );

		foreach (array_chunk($array_records, 1000) as $records) {
			\DB::table('embarcacion')->insert($records);
		}
    }
}
