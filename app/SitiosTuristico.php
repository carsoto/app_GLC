<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 07 May 2018 17:55:03 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class SitiosTuristico
 * 
 * @property int $id
 * @property string $sitio
 * @property int $actividades_id
 * @property int $islas_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Actividade $actividade
 * @property \App\Isla $isla
 *
 * @package App
 */
class SitiosTuristico extends Eloquent
{
	protected $casts = [
		'actividades_id' => 'int',
		'islas_id' => 'int'
	];

	protected $fillable = [
		'sitio',
		'actividades_id',
		'islas_id'
	];

	public function actividade()
	{
		return $this->belongsTo(\App\Actividade::class, 'actividades_id');
	}

	public function isla()
	{
		return $this->belongsTo(\App\Isla::class, 'islas_id');
	}
}
