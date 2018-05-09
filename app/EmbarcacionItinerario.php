<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 07 May 2018 17:55:03 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class EmbarcacionItinerario
 * 
 * @property int $id
 * @property int $embarcacion_id
 * @property int $itinerarios_id
 * @property int $orden
 * @property int $id_dia
 * @property string $am
 * @property string $pm
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Embarcacion $embarcacion
 * @property \App\Itinerario $itinerario
 *
 * @package App
 */
class EmbarcacionItinerario extends Eloquent
{
	protected $casts = [
		'embarcacion_id' => 'int',
		'itinerarios_id' => 'int',
		'orden' => 'int',
		'id_dia' => 'int'
	];

	protected $fillable = [
		'embarcacion_id',
		'itinerarios_id',
		'orden',
		'id_dia',
		'am',
		'pm'
	];

	public function embarcacion()
	{
		return $this->belongsTo(\App\Embarcacion::class);
	}

	public function itinerario()
	{
		return $this->belongsTo(\App\Itinerario::class, 'itinerarios_id');
	}
}
