<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 05 Apr 2018 16:25:45 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class YatesItinerario
 * 
 * @property int $yates_id
 * @property int $itinerarios_id
 * @property int $orden
 * @property int $id_dia
 * @property string $am
 * @property string $pm
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
		'orden' => 'int',
		'id_dia' => 'int'
	];

	protected $fillable = [
		'yates_id',
		'itinerarios_id',
		'orden',
		'id_dia',
		'am',
		'pm'
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
