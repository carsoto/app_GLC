<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 14 Mar 2018 19:57:27 +0000.
 */

namespace App\Models;

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
 * @package App\Models
 */
class TipoEmbarcacion extends Eloquent
{
	protected $table = 'tipo_embarcacion';

	protected $fillable = [
		'desc_tipo'
	];

	public function embarcacions()
	{
		return $this->hasMany(\App\Models\Embarcacion::class);
	}
}
