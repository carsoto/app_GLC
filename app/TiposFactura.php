<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 05 Apr 2018 16:25:45 +0000.
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
 * @property \Illuminate\Database\Eloquent\Collection $soportes_apas
 *
 * @package App
 */
class TiposFactura extends Eloquent
{
	protected $table = 'tipos_factura';

	protected $fillable = [
		'descripcion'
	];

	public function soportes_apas()
	{
		return $this->hasMany(\App\SoportesApa::class);
	}
}
