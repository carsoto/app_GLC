<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 26 Mar 2018 20:07:33 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class PlanesCubierta
 * 
 * @property int $id
 * @property string $descripcion
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Cabina $cabina
 *
 * @package App
 */
class PlanesCubierta extends Eloquent
{
	protected $fillable = [
		'descripcion'
	];

	public function cabina()
	{
		return $this->hasOne(\App\Cabina::class, 'planes_cubierta_id');
	}
}
