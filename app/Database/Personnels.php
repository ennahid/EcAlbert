<?php

namespace App\Database;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Personnels extends Authenticatable
{
    protected $table = 'personnels';
    protected $fillable = ['id','Nom','Prenom','Password','Function','Ville','Tele','Adresse','Email','Cin','Photo','Date_Naiss','Date_inscription','Role'];
}
