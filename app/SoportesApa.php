<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 06 Apr 2018 20:49:41 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class SoportesApa
 * 
 * @property int $id
 * @property int $tipos_factura_id
 * @property int $actividades_id
 * @property \Carbon\Carbon $fecha_factura
 * @property string $desc_factura
 * @property float $monto
 * @property string $soporte
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Actividade $actividade
 * @property \App\TiposFactura $tipos_factura
 * @property \App\Apa $apa
 *
 * @package App
 */
class SoportesApa extends Eloquent
{
	protected $table = 'soportes_apa';

	protected $casts = [
		'tipos_factura_id' => 'int',
		'actividades_id' => 'int',
		'monto' => 'float'
	];

	protected $dates = [
		'fecha_factura'
	];

	protected $fillable = [
		'tipos_factura_id',
		'actividades_id',
		'fecha_factura',
		'desc_factura',
		'monto',
		'soporte'
	];

	public function actividade()
	{
		return $this->belongsTo(\App\Actividade::class, 'actividades_id');
	}

	public function tipos_factura()
	{
		return $this->belongsTo(\App\TiposFactura::class);
	}

	public function apa()
	{
		return $this->hasOne(\App\Apa::class, 'soporte_apa_id');
	}
}
