<?php

namespace App\Database;

use Illuminate\Database\Eloquent\Model;

class Classe_Matiere extends Model
{
    protected $table = 'classes_matieres';
    protected $fillable = ['id','id_classe','id_matiere'];
}
