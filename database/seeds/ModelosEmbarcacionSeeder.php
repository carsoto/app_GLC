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
			0 => array('descripcion' => 'M/C Catamarán', 'tipos_embarcacion_id' => 1, 'created_at' => date('Y-m-d H:i:s')),
			1 => array('descripcion' => 'M/Y Monohull', 'tipos_embarcacion_id' => 1, 'created_at' => date('Y-m-d H:i:s')),
			2 => array('descripcion' => 'M/T Trimarán', 'tipos_embarcacion_id' => 1, 'created_at' => date('Y-m-d H:i:s')),
			3 => array('descripcion' => 'S/Y Monohull Velero', 'tipos_embarcacion_id' => 1, 'created_at' => date('Y-m-d H:i:s')),
            4 => array('descripcion' => 'S/C Catamarán Velero', 'tipos_embarcacion_id' => 1, 'created_at' => date('Y-m-d H:i:s')),
            5 => array('descripcion' => 'S/T Trimarán Velero', 'tipos_embarcacion_id' => 1, 'created_at' => date('Y-m-d H:i:s')),
            6 => array('descripcion' => 'L/B Lancha Buceo', 'tipos_embarcacion_id' => 2, 'created_at' => date('Y-m-d H:i:s')),
            7 => array('descripcion' => 'L/P Lancha Pesca', 'tipos_embarcacion_id' => 2, 'created_at' => date('Y-m-d H:i:s')),
            8 => array('descripcion' => 'L/TD Lancha Tour Diario', 'tipos_embarcacion_id' => 2, 'created_at' => date('Y-m-d H:i:s')),
            9 => array('descripcion' => 'L/C Lancha Cabotaje', 'tipos_embarcacion_id' => 2, 'created_at' => date('Y-m-d H:i:s')),
        );

		foreach (array_chunk($array_records, 1000) as $records) {
			\DB::table('modelos_embarcacion')->insert($records);
		}
    }
}
