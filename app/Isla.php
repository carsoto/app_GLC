<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 17 Apr 2018 02:23:49 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Isla
 * 
 * @property int $id
 * @property string $nombre
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $puertos
 * @property \Illuminate\Database\Eloquent\Collection $sitios_turisticos
 *
 * @package App
 */
class Isla extends Eloquent
{
	protected $fillable = [
		'nombre'
	];

	public function puertos()
	{
		return $this->hasMany(\App\Puerto::class, 'islas_id');
	}

	public function sitios_turisticos()
	{
		return $this->hasMany(\App\SitiosTuristico::class, 'islas_id');
	}
}