<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 07 May 2018 17:55:03 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Itinerario
 * 
 * @property int $id
 * @property string $nombre
 * @property string $url_imagen
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
		'nombre',
		'url_imagen'
	];

	public function embarcacions()
	{
		return $this->belongsToMany(\App\Embarcacion::class, 'embarcacion_itinerarios', 'itinerarios_id')
					->withPivot('id', 'orden', 'id_dia', 'am', 'pm')
					->withTimestamps();
	}
}
