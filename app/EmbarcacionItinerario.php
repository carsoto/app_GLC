<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 06 Apr 2018 20:49:41 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class EmbarcacionItinerario
 * 
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
	public $incrementing = false;

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