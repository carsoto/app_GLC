<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 13 Apr 2018 19:19:52 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Itinerario
 * 
 * @property int $id
 * @property string $nombre
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $embarcacions
 *
 * @package App
 */
class Itinerario extends Eloquent
{
	protected $fillable = [
		'nombre'
	];

	public function embarcacions()
	{
		return $this->belongsToMany(\App\Embarcacion::class, 'embarcacion_itinerarios', 'itinerarios_id')
					->withPivot('orden', 'id_dia', 'am', 'pm')
					->withTimestamps();
	}
}
