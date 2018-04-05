<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 05 Apr 2018 16:25:45 +0000.
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
 * @property \Illuminate\Database\Eloquent\Collection $yates
 *
 * @package App
 */
class TiposPatente extends Eloquent
{
	protected $table = 'tipos_patente';

	protected $fillable = [
		'descripcion'
	];

	public function yates()
	{
		return $this->hasMany(\App\Yate::class);
	}
}
