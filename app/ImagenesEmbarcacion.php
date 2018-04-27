<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 27 Apr 2018 16:07:15 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class ImagenesEmbarcacion
 * 
 * @property int $id
 * @property int $embarcacion_id
 * @property string $tipo_imagen
 * @property string $titulo
 * @property boolean $imagenes_embarcacion
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Embarcacion $embarcacion
 *
 * @package App
 */
class ImagenesEmbarcacion extends Eloquent
{
	protected $table = 'imagenes_embarcacion';

	protected $casts = [
		'embarcacion_id' => 'int',
		'imagenes_embarcacion' => 'boolean'
	];

	protected $fillable = [
		'embarcacion_id',
		'tipo_imagen',
		'titulo',
		'imagenes_embarcacion'
	];

	public function embarcacion()
	{
		return $this->belongsTo(\App\Embarcacion::class);
	}
}
