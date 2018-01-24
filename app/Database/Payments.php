<?php

namespace App\Database;

use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
 	protected $table = 'payments';
    protected $fillable = ['id','id_etudiant','date_payment'];
}
