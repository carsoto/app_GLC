<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 26 Mar 2018 20:07:33 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class ModelosYate
 * 
 * @property int $id
 * @property string $descripcion
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $yates
 *
 * @package App
 */
class ModelosYate extends Eloquent
{
	protected $table = 'modelos_yate';

	protected $fillable = [
		'descripcion'
	];

	public function yates()
	{
		return $this->hasMany(\App\Yate::class);
	}
}
