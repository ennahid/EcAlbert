<?php

namespace App\Database;

use Illuminate\Database\Eloquent\Model;

class Emploi extends Model
{
    protected $table = 'emploi';
    protected $fillable = ['id','Jour','hour_start','hour_end','id_salle','	id_prof','id_classe'];
}
