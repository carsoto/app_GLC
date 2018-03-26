<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 26 Mar 2018 20:07:33 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Itinerario
 * 
 * @property int $id
 * @property string $nombre
 * @property int $dia
 * @property string $am
 * @property string $pm
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $yates
 *
 * @package App
 */
class Itinerario extends Eloquent
{
	protected $casts = [
		'dia' => 'int'
	];

	protected $fillable = [
		'nombre',
		'dia',
		'am',
		'pm'
	];

	public function yates()
	{
		return $this->belongsToMany(\App\Yate::class, 'yates_itinerarios', 'itinerarios_id', 'yates_id')
					->withTimestamps();
	}
}
