<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 20 Mar 2018 20:51:40 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Pasajero
 * 
 * @property int $id
 * @property int $charters_id
 * @property string $nombre
 * @property int $edad
 * @property string $condicion_medica
 * @property string $contacto_emergencia
 * @property string $parentesco_contacto
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Charter $charter
 *
 * @package App
 */
class Pasajero extends Eloquent
{
	protected $casts = [
		'charters_id' => 'int',
		'edad' => 'int'
	];

	protected $fillable = [
		'charters_id',
		'nombre',
		'edad',
		'condicion_medica',
		'contacto_emergencia',
		'parentesco_contacto'
	];

	public function charter()
	{
		return $this->belongsTo(\App\Charter::class, 'charters_id');
	}
}
