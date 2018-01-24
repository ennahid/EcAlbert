<?php

namespace App\Database;

use Illuminate\Database\Eloquent\Model;

class Parents extends Model
{
    protected $table = 'parents';
    protected $fillable = ['id','Nom','Prenom','Email','Tele','Function'];
}
