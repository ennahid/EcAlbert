<?php

namespace App\Database;

use Illuminate\Database\Eloquent\Model;

class Matieres extends Model
{
    protected $table = 'matieres';
    protected $fillable = ['id','Nom'];
}
