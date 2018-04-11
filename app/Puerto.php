<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 10 Apr 2018 16:05:41 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Puerto
 * 
 * @property int $id
 * @property string $descripcion
 * @property string $ubicacion
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $embarcacions
 *
 * @package App
 */
class Puerto extends Eloquent
{
	protected $fillable = [
		'descripcion',
		'ubicacion'
	];

	public function embarcacions()
	{
		return $this->hasMany(\App\Embarcacion::class, 'puerto_registro_id');
	}
}
