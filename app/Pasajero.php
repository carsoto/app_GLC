<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 06 Apr 2018 20:49:41 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Pasajero
 * 
 * @property int $id
 * @property int $parentescos_id
 * @property string $nombre
 * @property int $edad
 * @property string $condicion_medica
 * @property string $contacto_emergencia
 * @property int $tipos_charter_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Parentesco $parentesco
 * @property \App\TiposCharter $tipos_charter
 *
 * @package App
 */
class Pasajero extends Eloquent
{
	public $incrementing = false;

	protected $casts = [
		'id' => 'int',
		'parentescos_id' => 'int',
		'edad' => 'int',
		'tipos_charter_id' => 'int'
	];

	protected $fillable = [
		'parentescos_id',
		'nombre',
		'edad',
		'condicion_medica',
		'contacto_emergencia',
		'tipos_charter_id'
	];

	public function parentesco()
	{
		return $this->belongsTo(\App\Parentesco::class, 'parentescos_id');
	}

	public function tipos_charter()
	{
		return $this->belongsTo(\App\TiposCharter::class);
	}
}
