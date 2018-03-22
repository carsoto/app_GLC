<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 22 Mar 2018 16:47:34 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Embarcacion
 * 
 * @property int $id
 * @property int $tipo_embarcacion_id
 * @property string $nombre_embarcacion
 * @property int $cant_pasajeros
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\TipoEmbarcacion $tipo_embarcacion
 * @property \Illuminate\Database\Eloquent\Collection $tipo_charters
 *
 * @package App
 */
class Embarcacion extends Eloquent
{
	protected $table = 'embarcacion';

	protected $casts = [
		'tipo_embarcacion_id' => 'int',
		'cant_pasajeros' => 'int'
	];

	protected $fillable = [
		'tipo_embarcacion_id',
		'nombre_embarcacion',
		'cant_pasajeros'
	];

	public function tipo_embarcacion()
	{
		return $this->belongsTo(\App\TipoEmbarcacion::class);
	}

	public function tipo_charters()
	{
		return $this->hasMany(\App\TipoCharter::class);
	}
}
