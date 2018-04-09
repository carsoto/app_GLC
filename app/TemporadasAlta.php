<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 09 Apr 2018 20:34:17 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TemporadasAlta
 * 
 * @property int $id
 * @property int $embarcacion_id
 * @property \Carbon\Carbon $desde
 * @property \Carbon\Carbon $hasta
 * @property float $cant_dias
 * @property float $gross
 * @property float $neto
 * @property float $comision_glc
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Embarcacion $embarcacion
 *
 * @package App
 */
class TemporadasAlta extends Eloquent
{
	protected $casts = [
		'embarcacion_id' => 'int',
		'cant_dias' => 'float',
		'gross' => 'float',
		'neto' => 'float',
		'comision_glc' => 'float'
	];

	protected $dates = [
		'desde',
		'hasta'
	];

	protected $fillable = [
		'embarcacion_id',
		'desde',
		'hasta',
		'cant_dias',
		'gross',
		'neto',
		'comision_glc'
	];

	public function embarcacion()
	{
		return $this->belongsTo(\App\Embarcacion::class);
	}
}
