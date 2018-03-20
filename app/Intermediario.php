<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 20 Mar 2018 20:51:40 +0000.
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
