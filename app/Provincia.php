<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provincia extends Model
{
    protected $table    =   'provincias';
    protected $fillable =   ['nombre','created_at','updated_at'];

    public  function choferes()
    {
        return $this->hasMany('App\Chofer');
    }
}
