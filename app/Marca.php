<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    protected $table =  'marcas';
    protected $fillable =   ['nombre','created_at','updated_at'];
    public function modelos()
    {
        return $this->hasMany('App\Modelo');
    }
}
