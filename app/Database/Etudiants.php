<?php

namespace App\Database;

use Illuminate\Database\Eloquent\Model;

class Etudiants extends Model
{
    protected $table = 'etudiants';
    protected $fillable = ['id','Nom','Prenom','Sexe','Ville','Adresse','Photo','Date_Naiss','id_classe','id_parent'];
}
