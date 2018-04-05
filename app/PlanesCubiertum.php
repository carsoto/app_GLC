<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 05 Apr 2018 16:25:45 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class PlanesCubiertum
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
class PlanesCubiertum extends Eloquent
{
	protected $fillable = [
		'descripcion'
	];

	public function cabina()
	{
		return $this->hasOne(\App\Cabina::class, 'planes_cubierta_id');
	}
}
