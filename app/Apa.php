<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 26 Mar 2018 20:07:33 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Apa
 * 
 * @property int $soporte_apa_id
 * @property int $charters_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Charter $charter
 * @property \App\SoportesApa $soportes_apa
 *
 * @package App
 */
class Apa extends Eloquent
{
	public $incrementing = false;

	protected $casts = [
		'soporte_apa_id' => 'int',
		'charters_id' => 'int'
	];

	protected $fillable = [
		'soporte_apa_id',
		'charters_id'
	];

	public function charter()
	{
		return $this->belongsTo(\App\Charter::class, 'charters_id');
	}

	public function soportes_apa()
	{
		return $this->belongsTo(\App\SoportesApa::class, 'soporte_apa_id');
	}
}
