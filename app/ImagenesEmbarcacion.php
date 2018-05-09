<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 07 May 2018 17:55:03 +0000.
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
		'embarcacion_id' => 'int'
	];

	protected $fillable = [
		'embarcacion_id',
		'tipo_imagen',
		'titulo'
	];

	public function embarcacion()
	{
		return $this->belongsTo(\App\Embarcacion::class);
	}
}
