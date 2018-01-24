<?php

namespace App\Database;

use Illuminate\Database\Eloquent\Model;

class Groupes extends Model
{
    protected $table = 'groupes';
    protected $fillable = ['id','Nom','id_classe'];
}
