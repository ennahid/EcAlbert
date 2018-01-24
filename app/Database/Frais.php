<?php

namespace App\Database;

use Illuminate\Database\Eloquent\Model;

class Frais extends Model
{
   protected $table = 'frais';
    protected $fillable = ['id','id_payment','payed','reste'];

}
