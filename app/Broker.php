<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 27 Mar 2018 17:49:12 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Broker
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
class Broker extends Eloquent
{
	protected $fillable = [
		'nombre',
		'email'
	];

	public function charters()
	{
		return $this->hasMany(\App\Charter::class, 'brokers_id');
	}
}