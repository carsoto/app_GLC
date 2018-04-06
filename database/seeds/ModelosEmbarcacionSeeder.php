<?php

use Illuminate\Database\Seeder;

class ModelosEmbarcacionSeeder extends Seeder
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
			0 => array('descripcion' => 'M/C Catamarán', 'created_at' => date('Y-m-d H:i:s')),
			1 => array('descripcion' => 'M/Y Monohull', 'created_at' => date('Y-m-d H:i:s')),
			2 => array('descripcion' => 'M/T Trimarán', 'created_at' => date('Y-m-d H:i:s')),
			3 => array('descripcion' => 'S/Y Monohull Velero', 'created_at' => date('Y-m-d H:i:s')),
            4 => array('descripcion' => 'S/C Catamarán Velero', 'created_at' => date('Y-m-d H:i:s')),
            5 => array('descripcion' => 'S/T Trimarán Velero', 'created_at' => date('Y-m-d H:i:s')),
            6 => array('descripcion' => 'L/B Lancha Buceo', 'created_at' => date('Y-m-d H:i:s')),
            7 => array('descripcion' => 'L/P Lancha Pesca', 'created_at' => date('Y-m-d H:i:s')),
            8 => array('descripcion' => 'L/TD Lancha Tour Diario', 'created_at' => date('Y-m-d H:i:s')),
            9 => array('descripcion' => 'L/C Lancha Cabotaje', 'created_at' => date('Y-m-d H:i:s')),
        );

		foreach (array_chunk($array_records, 1000) as $records) {
			\DB::table('modelos_embarcacion')->insert($records);
		}
    }
}
