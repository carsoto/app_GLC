<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 06 Apr 2018 20:49:41 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class ModelosEmbarcacion
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
class ModelosEmbarcacion extends Eloquent
{
	protected $table = 'modelos_embarcacion';

	protected $fillable = [
		'descripcion'
	];

	public function embarcacions()
	{
		return $this->hasMany(\App\Embarcacion::class);
	}
}