<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 27 Apr 2018 16:07:15 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Charter
 * 
 * @property int $id
 * @property string $codigo
 * @property string $cliente
 * @property int $brokers_id
 * @property string $tipo_charter
 * @property string $contrato
 * @property float $costo
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Broker $broker
 * @property \App\Apa $apa
 * @property \Illuminate\Database\Eloquent\Collection $tipos_charters
 *
 * @package App
 */
class Charter extends Eloquent
{
	protected $casts = [
		'brokers_id' => 'int',
		'costo' => 'float'
	];

	protected $fillable = [
		'codigo',
		'cliente',
		'brokers_id',
		'tipo_charter',
		'contrato',
		'costo'
	];

	public function broker()
	{
		return $this->belongsTo(\App\Broker::class, 'brokers_id');
	}

	public function apa()
	{
		return $this->hasOne(\App\Apa::class, 'charters_id');
	}

	public function tipos_charters()
	{
		return $this->hasMany(\App\TiposCharter::class, 'charters_id');
	}
}
