<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 21 Mar 2018 19:04:29 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TipoCharter
 * 
 * @property int $id
 * @property int $charters_id
 * @property int $embarcacion_id
 * @property int $nro_pax
 * @property \Carbon\Carbon $f_inicio
 * @property \Carbon\Carbon $f_fin
 * @property string $deluxe
 * @property float $tarifa_contrato
 * @property float $tarifa_neta
 * @property float $comision_intermediario
 * @property float $comision_glc
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Charter $charter
 * @property \App\Embarcacion $embarcacion
 * @property \Illuminate\Database\Eloquent\Collection $pasajeros
 *
 * @package App
 */
class TipoCharter extends Eloquent
{
	protected $table = 'tipo_charter';

	protected $casts = [
		'charters_id' => 'int',
		'embarcacion_id' => 'int',
		'nro_pax' => 'int',
		'tarifa_contrato' => 'float',
		'tarifa_neta' => 'float',
		'comision_intermediario' => 'float',
		'comision_glc' => 'float'
	];

	protected $dates = [
		'f_inicio',
		'f_fin'
	];

	protected $fillable = [
		'charters_id',
		'embarcacion_id',
		'nro_pax',
		'f_inicio',
		'f_fin',
		'deluxe',
		'tarifa_contrato',
		'tarifa_neta',
		'comision_intermediario',
		'comision_glc'
	];

	public function charter()
	{
		return $this->belongsTo(\App\Charter::class, 'charters_id');
	}

	public function embarcacion()
	{
		return $this->belongsTo(\App\Embarcacion::class);
	}

	public function pasajeros()
	{
		return $this->hasMany(\App\Pasajero::class);
	}
}
