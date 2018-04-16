<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 13 Apr 2018 19:19:52 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class ImagenesEmbarcacion
 * 
 * @property int $id
 * @property int $embarcacion_id
 * @property int $tipos_imagen_id
 * @property string $titulo
 * @property boolean $imagenes_embarcacion
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Embarcacion $embarcacion
 * @property \App\TiposImagen $tipos_imagen
 *
 * @package App
 */
class ImagenesEmbarcacion extends Eloquent
{
	protected $table = 'imagenes_embarcacion';

	protected $casts = [
		'embarcacion_id' => 'int',
		'tipos_imagen_id' => 'int',
		'imagenes_embarcacion' => 'boolean'
	];

	protected $fillable = [
		'embarcacion_id',
		'tipos_imagen_id',
		'titulo',
		'imagenes_embarcacion'
	];

	public function embarcacion()
	{
		return $this->belongsTo(\App\Embarcacion::class);
	}

	public function tipos_imagen()
	{
		return $this->belongsTo(\App\TiposImagen::class);
	}
}
