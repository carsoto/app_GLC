<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 14 Mar 2018 19:57:27 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Charter
 * 
 * @property int $id
 * @property string $codigo
 * @property string $cliente
 * @property int $intermediarios_id
 * @property string $contrato
 * @property \Carbon\Carbon $f_inicio
 * @property \Carbon\Carbon $f_fin
 * @property string $deluxe
 * @property float $tarifa_contrato
 * @property float $tarifa_neta
 * @property float $comision_intermediario
 * @property float $comision_glc
 * @property int $embarcacion_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\Embarcacion $embarcacion
 * @property \App\Models\Intermediario $intermediario
 *
 * @package App\Models
 */
class Charter extends Eloquent
{
	protected $casts = [
		'intermediarios_id' => 'int',
		'tarifa_contrato' => 'float',
		'tarifa_neta' => 'float',
		'comision_intermediario' => 'float',
		'comision_glc' => 'float',
		'embarcacion_id' => 'int'
	];

	protected $dates = [
		'f_inicio',
		'f_fin'
	];

	protected $fillable = [
		'codigo',
		'cliente',
		'intermediarios_id',
		'contrato',
		'f_inicio',
		'f_fin',
		'deluxe',
		'tarifa_contrato',
		'tarifa_neta',
		'comision_intermediario',
		'comision_glc',
		'embarcacion_id'
	];

	public function embarcacion()
	{
		return $this->belongsTo(\App\Models\Embarcacion::class);
	}

	public function intermediario()
	{
		return $this->belongsTo(\App\Models\Intermediario::class, 'intermediarios_id');
	}
}
