<?php

use Illuminate\Database\Seeder;

class ActividadesSeeder extends Seeder
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
				0 => array('servicios_id' => 1, 'descripcion' => 'Caminata', 'abreviatura' => 'Cma', 'tipos_patente_id' =>  1, 'created_at' => date('Y-m-d H:i:s')),
				1 => array('servicios_id' => 1, 'descripcion' => 'Campamento', 'abreviatura' => 'Cpo', 'tipos_patente_id' =>  1, 'created_at' => date('Y-m-d H:i:s')),
				2 => array('servicios_id' => 1, 'descripcion' => 'Snorkel', 'abreviatura' => 'Sn', 'tipos_patente_id' =>  2, 'created_at' => date('Y-m-d H:i:s')),
				3 => array('servicios_id' => 1, 'descripcion' => 'Panga Ride', 'abreviatura' => 'Pr', 'tipos_patente_id' =>  2, 'created_at' => date('Y-m-d H:i:s')),
				4 => array('servicios_id' => 1, 'descripcion' => 'Kayak', 'abreviatura' => 'Ky', 'tipos_patente_id' =>  2, 'created_at' => date('Y-m-d H:i:s')),
				5 => array('servicios_id' => 1, 'descripcion' => 'Buceo', 'abreviatura' => 'Bc/Sc', 'tipos_patente_id' =>  2, 'created_at' => date('Y-m-d H:i:s')),
				6 => array('servicios_id' => 1, 'descripcion' => 'Surf', 'abreviatura' => 'Sf', 'tipos_patente_id' =>  2, 'created_at' => date('Y-m-d H:i:s')),
				7 => array('servicios_id' => 1, 'descripcion' => 'Descanso Pesca Vivencial', 'abreviatura' => 'DPv', 'tipos_patente_id' =>  2, 'created_at' => date('Y-m-d H:i:s')),
				8 => array('servicios_id' => 1, 'descripcion' => 'Buceo Nocturno', 'abreviatura' => 'BcN', 'tipos_patente_id' =>  2, 'created_at' => date('Y-m-d H:i:s')),
				9 => array('servicios_id' => 1, 'descripcion' => 'Buceo de Instrucción', 'abreviatura' => 'Bi', 'tipos_patente_id' =>  2, 'created_at' => date('Y-m-d H:i:s')),
	        );

			foreach (array_chunk($array_records, 1000) as $records) {
				\DB::table('actividades')->insert($records);
			}
	}
}
