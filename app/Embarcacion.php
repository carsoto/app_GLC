<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 19 Mar 2018 20:08:57 +0000.
 */

namespace App;

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
 * @property \App\TipoEmbarcacion $tipo_embarcacion
 * @property \Illuminate\Database\Eloquent\Collection $charters
 *
 * @package App
 */
class Embarcacion extends Eloquent
{
	protected $table = 'embarcacion';

	protected $casts = [
		'cant_pasajeros' => 'int',
		'tipo_embarcacion_id' => 'int'
	];

	protected $fillable = [
		'nombre_embarcacion',
		'cant_pasajeros',
		'tipo_embarcacion_id'
	];

	public function tipo_embarcacion()
	{
		return $this->belongsTo(\App\TipoEmbarcacion::class);
	}

	public function charters()
	{
		return $this->hasMany(\App\Charter::class);
	}
}
