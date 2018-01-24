<?php

namespace App\Database;

use Illuminate\Database\Eloquent\Model;

class Professeurs extends Model
{
    protected $table = 'professeurs';
    protected $fillable = ['id','Nom','Prenom','Ville','Tele','Adresse','Email','Cin','Photo','Date_Naiss','Cin'];
}
