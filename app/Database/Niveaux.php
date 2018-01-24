<?php

namespace App\Database;

use Illuminate\Database\Eloquent\Model;

class Niveaux extends Model
{
    protected $table = 'niveaux';
    protected $fillable = ['id','Nom','Description'];
}
