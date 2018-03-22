<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 22 Mar 2018 16:47:34 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Intermediario
 * 
 * @property int $id
 * @property string $nombre
 * @property string $email
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $charters
 *
 * @package App
 */
class Intermediario extends Eloquent
{
	protected $fillable = [
		'nombre',
		'email'
	];

	public function charters()
	{
		return $this->hasMany(\App\Charter::class, 'intermediarios_id');
	}
}
