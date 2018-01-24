<?php

namespace App\Database;

use Illuminate\Database\Eloquent\Model;

class Salles extends Model
{
    protected $table = 'salles';
    protected $fillable = ['id','Nom','Function'];
}
