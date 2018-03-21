<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 21 Mar 2018 19:04:29 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TiposFactura
 * 
 * @property int $id
 * @property string $descripcion
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $soporte_apas
 *
 * @package App
 */
class TiposFactura extends Eloquent
{
	protected $table = 'tipos_factura';

	protected $fillable = [
		'descripcion'
	];

	public function soporte_apas()
	{
		return $this->hasMany(\App\SoporteApa::class);
	}
}
