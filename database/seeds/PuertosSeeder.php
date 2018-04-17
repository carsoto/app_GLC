<?php

use Illuminate\Database\Seeder;

class PuertosSeeder extends Seeder
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
            0 => array('descripcion' => 'Pto. Baquerizo Moreno', 'provincia' => 'Galápagos', 'islas_id' => 11, 'created_at' => date('Y-m-d H:i:s')),
            1 => array('descripcion' => 'Pto. Ayora', 'provincia' => 'Galápagos', 'islas_id' => 12, 'created_at' => date('Y-m-d H:i:s')),
            2 => array('descripcion' => 'Pto. Velasco Ibarra', 'provincia' => 'Galápagos', 'islas_id' => 5, 'created_at' => date('Y-m-d H:i:s')),
            3 => array('descripcion' => 'Pto. Villamil', 'provincia' => 'Galápagos', 'islas_id' => 7, 'created_at' => date('Y-m-d H:i:s')),
            4 => array('descripcion' => 'Pto. Baltra', 'provincia' => 'Galápagos', 'islas_id' => 16, 'created_at' => date('Y-m-d H:i:s')),
            5 => array('descripcion' => 'Pto. Guayaquil', 'provincia' => 'Guayas', 'islas_id' => 23, 'created_at' => date('Y-m-d H:i:s')),
            6 => array('descripcion' => 'Pto. Manta', 'provincia' => 'Manabí', 'islas_id' => 23, 'created_at' => date('Y-m-d H:i:s')),
            7 => array('descripcion' => 'Pto. Machala', 'provincia' => 'El Oro', 'islas_id' => 23, 'created_at' => date('Y-m-d H:i:s')),
            8 => array('descripcion' => 'Pto. Esmeraldas', 'provincia' => 'Esmeralda', 'islas_id' => 23, 'created_at' => date('Y-m-d H:i:s')),
        );

		foreach (array_chunk($array_records, 1000) as $records) {
			\DB::table('puertos')->insert($records);
		}
    }
}
