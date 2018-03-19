<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 19 Mar 2018 18:00:35 +0000.
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
 * 
 * @property \App\Charter $charter
 *
 * @package App
 */
class Pasajero extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'charters_id' => 'int',
		'edad' => 'int'
	];

	protected $fillable = [
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
