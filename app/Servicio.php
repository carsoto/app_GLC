<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 06 Apr 2018 20:49:41 +0000.
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
