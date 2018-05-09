<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 07 May 2018 17:55:03 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Embarcacion
 * 
 * @property int $id
 * @property string $nombre
 * @property string $anyo_construccion
 * @property string $refit
 * @property int $puerto_registro_id
 * @property int $companias_embarcacion_id
 * @property int $modelos_embarcacion_id
 * @property int $tipos_patente_id
 * @property string $capacidad
 * @property string $eslora
 * @property string $manga
 * @property string $puntal
 * @property string $velocidad_crucero
 * @property string $nro_tripulantes
 * @property string $estabilizadores
 * @property string $internet
 * @property int $kayacks
 * @property int $paddle_boards
 * @property string $ameneties
 * @property string $trajes_neopreno
 * @property string $equipo_snorkel
 * @property string $politicas_pago
 * @property string $cancelaciones
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\CompaniasEmbarcacion $companias_embarcacion
 * @property \App\ModelosEmbarcacion $modelos_embarcacion
 * @property \App\Puerto $puerto
 * @property \App\TiposPatente $tipos_patente
 * @property \Illuminate\Database\Eloquent\Collection $itinerarios
 * @property \Illuminate\Database\Eloquent\Collection $imagenes_embarcacions
 * @property \Illuminate\Database\Eloquent\Collection $tarifarios
 * @property \Illuminate\Database\Eloquent\Collection $temporadas_altas
 * @property \Illuminate\Database\Eloquent\Collection $tipos_charters
 *
 * @package App
 */
class Embarcacion extends Eloquent
{
	protected $table = 'embarcacion';

	protected $casts = [
		'puerto_registro_id' => 'int',
		'companias_embarcacion_id' => 'int',
		'modelos_embarcacion_id' => 'int',
		'tipos_patente_id' => 'int',
		'kayacks' => 'int',
		'paddle_boards' => 'int'
	];

	protected $fillable = [
		'nombre',
		'anyo_construccion',
		'refit',
		'puerto_registro_id',
		'companias_embarcacion_id',
		'modelos_embarcacion_id',
		'tipos_patente_id',
		'capacidad',
		'eslora',
		'manga',
		'puntal',
		'velocidad_crucero',
		'nro_tripulantes',
		'estabilizadores',
		'internet',
		'kayacks',
		'paddle_boards',
		'ameneties',
		'trajes_neopreno',
		'equipo_snorkel',
		'politicas_pago',
		'cancelaciones'
	];

	public function companias_embarcacion()
	{
		return $this->belongsTo(\App\CompaniasEmbarcacion::class);
	}

	public function modelos_embarcacion()
	{
		return $this->belongsTo(\App\ModelosEmbarcacion::class);
	}

	public function puerto()
	{
		return $this->belongsTo(\App\Puerto::class, 'puerto_registro_id');
	}

	public function tipos_patente()
	{
		return $this->belongsTo(\App\TiposPatente::class);
	}

	public function itinerarios()
	{
		return $this->belongsToMany(\App\Itinerario::class, 'embarcacion_itinerarios', 'embarcacion_id', 'itinerarios_id')
					->withPivot('id', 'orden', 'id_dia', 'am', 'pm')
					->withTimestamps();
	}

	public function imagenes_embarcacions()
	{
		return $this->hasMany(\App\ImagenesEmbarcacion::class);
	}

	public function tarifarios()
	{
		return $this->hasMany(\App\Tarifario::class);
	}

	public function temporadas_altas()
	{
		return $this->hasMany(\App\TemporadasAlta::class);
	}

	public function tipos_charters()
	{
		return $this->hasMany(\App\TiposCharter::class);
	}
}
