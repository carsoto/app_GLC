<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 27 Mar 2018 17:49:12 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class YatesItinerario
 * 
 * @property int $yates_id
 * @property int $itinerarios_id
 * @property float $tarifa
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Itinerario $itinerario
 * @property \App\Yate $yate
 *
 * @package App
 */
class YatesItinerario extends Eloquent
{
	public $incrementing = false;

	protected $casts = [
		'yates_id' => 'int',
		'itinerarios_id' => 'int',
		'tarifa' => 'float'
	];

	protected $fillable = [
		'yates_id',
		'itinerarios_id',
		'tarifa'
	];

	public function itinerario()
	{
		return $this->belongsTo(\App\Itinerario::class, 'itinerarios_id');
	}

	public function yate()
	{
		return $this->belongsTo(\App\Yate::class, 'yates_id');
	}
}
