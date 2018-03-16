<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 14 Mar 2018 19:57:27 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Embarcacion
 * 
 * @property int $id
 * @property string $nombre_embarcacion
 * @property int $cant_pasajeros
 * @property int $tipo_embarcacion_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\TipoEmbarcacion $tipo_embarcacion
 * @property \Illuminate\Database\Eloquent\Collection $charters
 *
 * @package App\Models
 */
class Embarcacion extends Eloquent
{
	protected $table = 'embarcacion';
	public $incrementing = false;

	protected $casts = [
		'id' => 'int',
		'cant_pasajeros' => 'int',
		'tipo_embarcacion_id' => 'int'
	];

	protected $fillable = [
		'id',
		'nombre_embarcacion',
		'cant_pasajeros',
		'tipo_embarcacion_id'
	];

	public function tipo_embarcacion()
	{
		return $this->belongsTo(\App\Models\TipoEmbarcacion::class);
	}

	public function charters()
	{
		return $this->hasMany(\App\Models\Charter::class);
	}
}
