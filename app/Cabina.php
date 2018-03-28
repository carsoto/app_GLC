<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 27 Mar 2018 17:49:12 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Cabina
 * 
 * @property int $yates_id
 * @property int $planes_cubierta_id
 * @property int $tipos_cabina_id
 * @property int $cantidad
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\PlanesCubiertum $planes_cubiertum
 * @property \App\TiposCabina $tipos_cabina
 * @property \App\Yate $yate
 *
 * @package App
 */
class Cabina extends Eloquent
{
	public $incrementing = false;

	protected $casts = [
		'yates_id' => 'int',
		'planes_cubierta_id' => 'int',
		'tipos_cabina_id' => 'int',
		'cantidad' => 'int'
	];

	protected $fillable = [
		'yates_id',
		'planes_cubierta_id',
		'tipos_cabina_id',
		'cantidad'
	];

	public function planes_cubiertum()
	{
		return $this->belongsTo(\App\PlanesCubiertum::class, 'planes_cubierta_id');
	}

	public function tipos_cabina()
	{
		return $this->belongsTo(\App\TiposCabina::class);
	}

	public function yate()
	{
		return $this->belongsTo(\App\Yate::class, 'yates_id');
	}
}