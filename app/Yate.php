<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 26 Mar 2018 20:07:34 +0000.
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
 * @property float $tarifa
 * @property int $companias_yate_id
 * @property int $modelos_yate_id
 * @property int $tipos_patente_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\CompaniasYate $companias_yate
 * @property \App\ModelosYate $modelos_yate
 * @property \App\Puerto $puerto
 * @property \App\TiposPatente $tipos_patente
 * @property \App\Cabina $cabina
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
		'tarifa' => 'float',
		'companias_yate_id' => 'int',
		'modelos_yate_id' => 'int',
		'tipos_patente_id' => 'int'
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
		'tarifa',
		'companias_yate_id',
		'modelos_yate_id',
		'tipos_patente_id'
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

	public function tipos_charters()
	{
		return $this->hasMany(\App\TiposCharter::class, 'yates_id');
	}

	public function itinerarios()
	{
		return $this->belongsToMany(\App\Itinerario::class, 'yates_itinerarios', 'yates_id', 'itinerarios_id')
					->withTimestamps();
	}
}
