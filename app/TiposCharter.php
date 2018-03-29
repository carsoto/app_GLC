<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 29 Mar 2018 17:03:36 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TiposCharter
 * 
 * @property int $id
 * @property int $charters_id
 * @property int $nro_pax
 * @property \Carbon\Carbon $f_inicio
 * @property \Carbon\Carbon $f_fin
 * @property string $deluxe
 * @property float $tarifa_contrato
 * @property float $tarifa_neta
 * @property float $comision_intermediario
 * @property float $comision_glc
 * @property int $yates_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Charter $charter
 * @property \App\Yate $yate
 * @property \Illuminate\Database\Eloquent\Collection $pasajeros
 *
 * @package App
 */
class TiposCharter extends Eloquent
{
	protected $table = 'tipos_charter';

	protected $casts = [
		'charters_id' => 'int',
		'nro_pax' => 'int',
		'tarifa_contrato' => 'float',
		'tarifa_neta' => 'float',
		'comision_intermediario' => 'float',
		'comision_glc' => 'float',
		'yates_id' => 'int'
	];

	protected $dates = [
		'f_inicio',
		'f_fin'
	];

	protected $fillable = [
		'charters_id',
		'nro_pax',
		'f_inicio',
		'f_fin',
		'deluxe',
		'tarifa_contrato',
		'tarifa_neta',
		'comision_intermediario',
		'comision_glc',
		'yates_id'
	];

	public function charter()
	{
		return $this->belongsTo(\App\Charter::class, 'charters_id');
	}

	public function yate()
	{
		return $this->belongsTo(\App\Yate::class, 'yates_id');
	}

	public function pasajeros()
	{
		return $this->hasMany(\App\Pasajero::class);
	}
}
