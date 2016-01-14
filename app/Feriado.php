<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feriado extends Model
{
    protected $table    =   'feriados';
    protected $fillable =   ['fecha','motivo','created_at','updated_at'];
}
