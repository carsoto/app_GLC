<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 05 Apr 2018 16:25:45 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Tarifario
 * 
 * @property int $id
 * @property int $yates_id
 * @property float $cant_dias
 * @property float $gross
 * @property float $neto
 * @property float $comision_glc
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Yate $yate
 *
 * @package App
 */
class Tarifario extends Eloquent
{
	protected $table = 'tarifario';

	protected $casts = [
		'yates_id' => 'int',
		'cant_dias' => 'float',
		'gross' => 'float',
		'neto' => 'float',
		'comision_glc' => 'float'
	];

	protected $fillable = [
		'yates_id',
		'cant_dias',
		'gross',
		'neto',
		'comision_glc'
	];

	public function yate()
	{
		return $this->belongsTo(\App\Yate::class, 'yates_id');
	}
}
