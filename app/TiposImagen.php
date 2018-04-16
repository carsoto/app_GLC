<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 13 Apr 2018 19:19:53 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TiposImagen
 * 
 * @property int $id
 * @property string $descripcion
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $imagenes_embarcacions
 *
 * @package App
 */
class TiposImagen extends Eloquent
{
	protected $table = 'tipos_imagen';

	protected $fillable = [
		'descripcion'
	];

	public function imagenes_embarcacions()
	{
		return $this->hasMany(\App\ImagenesEmbarcacion::class);
	}
}
