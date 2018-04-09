<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 09 Apr 2018 20:34:17 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TiposPatente
 * 
 * @property int $id
 * @property string $descripcion
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $embarcacions
 *
 * @package App
 */
class TiposPatente extends Eloquent
{
	protected $table = 'tipos_patente';

	protected $fillable = [
		'descripcion'
	];

	public function embarcacions()
	{
		return $this->hasMany(\App\Embarcacion::class);
	}
}
