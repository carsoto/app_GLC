<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 22 Mar 2018 16:47:34 +0000.
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
 * @package App
 */
class Apa extends Eloquent
{
	protected $table = 'apa';
	public $incrementing = false;

	protected $casts = [
		'soporte_apa_id' => 'int',
		'charters_id' => 'int'
	];

	protected $fillable = [
		'soporte_apa_id',
		'charters_id'
	];
}
