<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 03 Apr 2018 20:44:53 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class ContactosCompaniaYate
 * 
 * @property int $id
 * @property int $compania_yate_id
 * @property string $nombre
 * @property string $email
 * @property string $telefono
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\CompaniasYate $companias_yate
 *
 * @package App
 */
class ContactosCompaniaYate extends Eloquent
{
	protected $table = 'contactos_compania_yate';

	protected $casts = [
		'compania_yate_id' => 'int'
	];

	protected $fillable = [
		'compania_yate_id',
		'nombre',
		'email',
		'telefono'
	];

	public function companias_yate()
	{
		return $this->belongsTo(\App\CompaniasYate::class, 'compania_yate_id');
	}
}
