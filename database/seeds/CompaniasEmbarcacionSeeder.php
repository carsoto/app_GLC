<?php

use Illuminate\Database\Seeder;

class CompaniasEmbarcacionSeeder extends Seeder
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
        	0 => array('razon_social' => 'Aryel Dvorquez', 'ruc' => 123456, 'direccion' => 123456, 'telefono_1' => 123456, 'telefono_2' => 123456, 'banco' => 123456, 'cuenta_bancaria' => 123456, 'acuerdo_comercial' => 123456, 'created_at' => date('Y-m-d H:i:s')),
        	1 => array('razon_social' => 'Stephanie Saman', 'ruc' => 123456, 'direccion' => 123456, 'telefono_1' => 123456, 'telefono_2' => 123456, 'banco' => 123456, 'cuenta_bancaria' => 123456, 'acuerdo_comercial' => 123456, 'created_at' => date('Y-m-d H:i:s')),
        );

        foreach (array_chunk($array_records, 1000) as $records) {
			\DB::table('companias_embarcacion')->insert($records);
		}
    }
}
