<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 21 Mar 2018 19:04:28 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Actividade
 * 
 * @property int $id
 * @property int $servicios_id
 * @property string $descripcion
 * @property string $categoria
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Servicio $servicio
 * @property \Illuminate\Database\Eloquent\Collection $soporte_apas
 *
 * @package App
 */
class Actividade extends Eloquent
{
	protected $casts = [
		'servicios_id' => 'int'
	];

	protected $fillable = [
		'servicios_id',
		'descripcion',
		'categoria'
	];

	public function servicio()
	{
		return $this->belongsTo(\App\Servicio::class, 'servicios_id');
	}

	public function soporte_apas()
	{
		return $this->hasMany(\App\SoporteApa::class, 'actividades_id');
	}
}
