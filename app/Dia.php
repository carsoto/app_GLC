<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 17 Apr 2018 02:23:49 +0000.
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
