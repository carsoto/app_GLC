<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 10 Apr 2018 16:05:42 +0000.
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
