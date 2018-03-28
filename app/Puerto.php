<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 27 Mar 2018 17:49:12 +0000.
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
 * @property \Illuminate\Database\Eloquent\Collection $yates
 *
 * @package App
 */
class Puerto extends Eloquent
{
	protected $fillable = [
		'descripcion',
		'ubicacion'
	];

	public function yates()
	{
		return $this->hasMany(\App\Yate::class, 'puerto_registro_id');
	}
}