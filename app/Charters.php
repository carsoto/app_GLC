<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Charters extends Model
{
    protected $table = "charters";
    protected $fillable = ['id', 'codigo', 'yate', 'f_inicio', 'f_fin', 'nro_pax', 'intermediario', 'deluxe', 'tarifa'];
}
