<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 27 Mar 2018 17:49:12 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TiposCabina
 * 
 * @property int $id
 * @property string $descripcion
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Cabina $cabina
 *
 * @package App
 */
class TiposCabina extends Eloquent
{
	protected $table = 'tipos_cabina';

	protected $fillable = [
		'descripcion'
	];

	public function cabina()
	{
		return $this->hasOne(\App\Cabina::class);
	}
}
