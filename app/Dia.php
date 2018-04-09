<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 09 Apr 2018 20:34:16 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Dia
 * 
 * @property int $id
 * @property string $dia
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App
 */
class Dia extends Eloquent
{
	protected $fillable = [
		'dia'
	];
}
