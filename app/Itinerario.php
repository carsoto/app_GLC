<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 29 Mar 2018 17:03:35 +0000.
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
					->withPivot('dia', 'am', 'pm')
					->withTimestamps();
	}
}
