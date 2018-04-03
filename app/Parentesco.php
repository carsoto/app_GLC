<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 03 Apr 2018 20:44:53 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Parentesco
 * 
 * @property int $id
 * @property string $descripcion
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $pasajeros
 *
 * @package App
 */
class Parentesco extends Eloquent
{
	protected $fillable = [
		'descripcion'
	];

	public function pasajeros()
	{
		return $this->hasMany(\App\Pasajero::class, 'parentescos_id');
	}
}
