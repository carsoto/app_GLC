<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 29 Mar 2018 17:03:36 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Yate
 * 
 * @property int $id
 * @property string $nombre
 * @property string $capacidad
 * @property string $nro_tripulantes
 * @property int $puerto_registro_id
 * @property string $loa
 * @property string $beam
 * @property string $velocidad_crucero
 * @property string $estabilizadores
 * @property string $ameneties
 * @property string $internet
 * @property string $trajes_neopreno
 * @property string $equipo_snorkel
 * @property int $kayacks
 * @property int $paddle_boards
 * @property string $anyo_construccion
 * @property string $refit
 * @property string $propietario
 * @property int $companias_yate_id
 * @property int $modelos_yate_id
 * @property int $tipos_patente_id
 * @property string $incluye
 * @property string $no_incluye
 * @property string $politicas_pago
 * @property string $cancelaciones
 * @property string $desck_plan
 * @property float $tarifa_temp_alta
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\CompaniasYate $companias_yate
 * @property \App\ModelosYate $modelos_yate
 * @property \App\Puerto $puerto
 * @property \App\TiposPatente $tipos_patente
 * @property \App\Cabina $cabina
 * @property \Illuminate\Database\Eloquent\Collection $tarifarios
 * @property \Illuminate\Database\Eloquent\Collection $temporadas_altas
 * @property \Illuminate\Database\Eloquent\Collection $tipos_charters
 * @property \Illuminate\Database\Eloquent\Collection $itinerarios
 *
 * @package App
 */
class Yate extends Eloquent
{
	protected $casts = [
		'puerto_registro_id' => 'int',
		'kayacks' => 'int',
		'paddle_boards' => 'int',
		'companias_yate_id' => 'int',
		'modelos_yate_id' => 'int',
		'tipos_patente_id' => 'int',
		'tarifa_temp_alta' => 'float'
	];

	protected $fillable = [
		'nombre',
		'capacidad',
		'nro_tripulantes',
		'puerto_registro_id',
		'loa',
		'beam',
		'velocidad_crucero',
		'estabilizadores',
		'ameneties',
		'internet',
		'trajes_neopreno',
		'equipo_snorkel',
		'kayacks',
		'paddle_boards',
		'anyo_construccion',
		'refit',
		'propietario',
		'companias_yate_id',
		'modelos_yate_id',
		'tipos_patente_id',
		'incluye',
		'no_incluye',
		'politicas_pago',
		'cancelaciones',
		'desck_plan',
		'tarifa_temp_alta'
	];

	public function companias_yate()
	{
		return $this->belongsTo(\App\CompaniasYate::class);
	}

	public function modelos_yate()
	{
		return $this->belongsTo(\App\ModelosYate::class);
	}

	public function puerto()
	{
		return $this->belongsTo(\App\Puerto::class, 'puerto_registro_id');
	}

	public function tipos_patente()
	{
		return $this->belongsTo(\App\TiposPatente::class);
	}

	public function cabina()
	{
		return $this->hasOne(\App\Cabina::class, 'yates_id');
	}

	public function tarifarios()
	{
		return $this->hasMany(\App\Tarifario::class, 'yates_id');
	}

	public function temporadas_altas()
	{
		return $this->hasMany(\App\TemporadasAlta::class, 'yates_id');
	}

	public function tipos_charters()
	{
		return $this->hasMany(\App\TiposCharter::class, 'yates_id');
	}

	public function itinerarios()
	{
		return $this->belongsToMany(\App\Itinerario::class, 'yates_itinerarios', 'yates_id', 'itinerarios_id')
					->withPivot('dia', 'am', 'pm')
					->withTimestamps();
	}
}
