<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 27 Apr 2018 16:07:15 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Actividade
 * 
 * @property int $id
 * @property int $servicios_id
 * @property string $descripcion
 * @property string $abreviatura
 * @property string $categoria
 * @property int $tipos_patente_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Servicio $servicio
 * @property \App\TiposPatente $tipos_patente
 * @property \Illuminate\Database\Eloquent\Collection $sitios_turisticos
 * @property \Illuminate\Database\Eloquent\Collection $soportes_apas
 *
 * @package App
 */
class Actividade extends Eloquent
{
	protected $casts = [
		'servicios_id' => 'int',
		'tipos_patente_id' => 'int'
	];

	protected $fillable = [
		'servicios_id',
		'descripcion',
		'abreviatura',
		'categoria',
		'tipos_patente_id'
	];

	public function servicio()
	{
		return $this->belongsTo(\App\Servicio::class, 'servicios_id');
	}

	public function tipos_patente()
	{
		return $this->belongsTo(\App\TiposPatente::class);
	}

	public function sitios_turisticos()
	{
		return $this->hasMany(\App\SitiosTuristico::class, 'actividades_id');
	}

	public function soportes_apas()
	{
		return $this->hasMany(\App\SoportesApa::class, 'actividades_id');
	}
}
