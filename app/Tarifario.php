<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 27 Apr 2018 16:07:15 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Tarifario
 * 
 * @property int $id
 * @property int $embarcacion_id
 * @property int $cant_dias
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
class Tarifario extends Eloquent
{
	protected $table = 'tarifario';

	protected $casts = [
		'embarcacion_id' => 'int',
		'cant_dias' => 'int',
		'gross' => 'float',
		'neto' => 'float',
		'comision_glc' => 'float'
	];

	protected $fillable = [
		'embarcacion_id',
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
