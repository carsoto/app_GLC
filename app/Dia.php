<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 03 Apr 2018 20:44:53 +0000.
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
