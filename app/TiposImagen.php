<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 27 Apr 2018 15:28:16 +0000.
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
 * @package App
 */
class TiposImagen extends Eloquent
{
	protected $table = 'tipos_imagen';

	protected $fillable = [
		'descripcion'
	];
}
