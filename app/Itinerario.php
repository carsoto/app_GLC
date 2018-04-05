<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 05 Apr 2018 16:25:45 +0000.
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
 * @property \Illuminate\Database\Eloquent\Collection $yates
 *
 * @package App
 */
class Itinerario extends Eloquent
{
	protected $fillable = [
		'nombre'
	];

	public function yates()
	{
		return $this->belongsToMany(\App\Yate::class, 'yates_itinerarios', 'itinerarios_id', 'yates_id')
					->withPivot('orden', 'id_dia', 'am', 'pm')
					->withTimestamps();
	}
}
