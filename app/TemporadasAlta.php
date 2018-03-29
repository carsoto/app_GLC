<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 29 Mar 2018 17:03:36 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TemporadasAlta
 * 
 * @property int $id
 * @property int $yates_id
 * @property \Carbon\Carbon $desde
 * @property \Carbon\Carbon $hasta
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Yate $yate
 *
 * @package App
 */
class TemporadasAlta extends Eloquent
{
	protected $casts = [
		'yates_id' => 'int'
	];

	protected $dates = [
		'desde',
		'hasta'
	];

	protected $fillable = [
		'yates_id',
		'desde',
		'hasta'
	];

	public function yate()
	{
		return $this->belongsTo(\App\Yate::class, 'yates_id');
	}
}
