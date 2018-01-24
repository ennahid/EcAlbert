<?php

namespace App\Database;

use Illuminate\Database\Eloquent\Model;

class Professeur_Groupe extends Model
{
	protected $table = 'professeurs_groupes';
    protected $fillable = ['id','id_professeur','id_groupe'];
}
