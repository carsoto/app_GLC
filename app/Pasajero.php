<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 21 Mar 2018 19:04:29 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Pasajero
 * 
 * @property int $id
 * @property int $tipo_charter_id
 * @property string $nombre
 * @property int $edad
 * @property string $condicion_medica
 * @property string $contacto_emergencia
 * @property string $parentesco_contacto
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\TipoCharter $tipo_charter
 *
 * @package App
 */
class Pasajero extends Eloquent
{
	protected $casts = [
		'tipo_charter_id' => 'int',
		'edad' => 'int'
	];

	protected $fillable = [
		'tipo_charter_id',
		'nombre',
		'edad',
		'condicion_medica',
		'contacto_emergencia',
		'parentesco_contacto'
	];

	public function tipo_charter()
	{
		return $this->belongsTo(\App\TipoCharter::class);
	}
}
