<?php

namespace App\Database;

use Illuminate\Database\Eloquent\Model;

class absence_retard extends Model
{
    protected $table = 'absences_retards';
    protected $fillable = ['id','A_R','De','A','id_etudiant','justif'];
}
