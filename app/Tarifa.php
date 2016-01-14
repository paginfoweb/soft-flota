<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tarifa extends Model
{
    protected $table =  'tarifas';
    protected $fillable =   ['type','lunes','martes','miercoles','jueves','viernes'
                            ,'domingo','created_at','updated_at'];

    public function vehiculos()
    {
        return $this->hasMany('App\Vehiculo');

    }
}
