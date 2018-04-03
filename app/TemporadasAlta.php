<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 03 Apr 2018 20:44:53 +0000.
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
