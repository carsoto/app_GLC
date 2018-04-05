<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 05 Apr 2018 16:25:45 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class CompaniasYate
 * 
 * @property int $id
 * @property string $razon_social
 * @property string $ruc
 * @property string $direccion
 * @property string $telefono_1
 * @property string $telefono_2
 * @property string $banco
 * @property string $cuenta_bancaria
 * @property string $acuerdo_comercial
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $contactos_compania_yates
 * @property \Illuminate\Database\Eloquent\Collection $yates
 *
 * @package App
 */
class CompaniasYate extends Eloquent
{
	protected $table = 'companias_yate';

	protected $fillable = [
		'razon_social',
		'ruc',
		'direccion',
		'telefono_1',
		'telefono_2',
		'banco',
		'cuenta_bancaria',
		'acuerdo_comercial'
	];

	public function contactos_compania_yates()
	{
		return $this->hasMany(\App\ContactosCompaniaYate::class, 'compania_yate_id');
	}

	public function yates()
	{
		return $this->hasMany(\App\Yate::class);
	}
}
