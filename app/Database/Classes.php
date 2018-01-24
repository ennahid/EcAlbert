<?php

namespace App\Database;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    protected $table = 'classes';
    protected $fillable = ['id','Nom','Description','Frais'];
}
