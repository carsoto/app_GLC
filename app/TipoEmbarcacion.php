<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 22 Mar 2018 16:47:34 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TipoEmbarcacion
 * 
 * @property int $id
 * @property string $desc_tipo
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $embarcacions
 *
 * @package App
 */
class TipoEmbarcacion extends Eloquent
{
	protected $table = 'tipo_embarcacion';

	protected $fillable = [
		'desc_tipo'
	];

	public function embarcacions()
	{
		return $this->hasMany(\App\Embarcacion::class);
	}
}
