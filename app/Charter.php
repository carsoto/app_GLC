<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 22 Mar 2018 16:47:34 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Charter
 * 
 * @property int $id
 * @property int $intermediarios_id
 * @property string $codigo
 * @property string $cliente
 * @property string $tipo_charter
 * @property string $contrato
 * @property float $costo
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Intermediario $intermediario
 * @property \Illuminate\Database\Eloquent\Collection $tipo_charters
 *
 * @package App
 */
class Charter extends Eloquent
{
	protected $casts = [
		'intermediarios_id' => 'int',
		'costo' => 'float'
	];

	protected $fillable = [
		'intermediarios_id',
		'codigo',
		'cliente',
		'tipo_charter',
		'contrato',
		'costo'
	];

	public function intermediario()
	{
		return $this->belongsTo(\App\Intermediario::class, 'intermediarios_id');
	}

	public function tipo_charters()
	{
		return $this->hasMany(\App\TipoCharter::class, 'charters_id');
	}
}
