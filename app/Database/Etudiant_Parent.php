<?php

namespace App\Database;

use Illuminate\Database\Eloquent\Model;

class Etudiant_parent extends Model
{
    protected $table = 'etudiants_parents';
    protected $fillable = ['id','id_etudiant','id_parent'];
}
