<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 21 Mar 2018 19:04:29 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Servicio
 * 
 * @property int $id
 * @property string $descripcion
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $actividades
 *
 * @package App
 */
class Servicio extends Eloquent
{
	protected $fillable = [
		'descripcion'
	];

	public function actividades()
	{
		return $this->hasMany(\App\Actividade::class, 'servicios_id');
	}
}
