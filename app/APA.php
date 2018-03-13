<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class APA extends Model
{
    protected $table = "apa";
    protected $fillable = ['id', 'charter', 'cliente'];
}
