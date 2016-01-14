<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Propietaria extends Model
{
    protected $table = 'propietarias';
    protected $fillable =   ['ruc', 'name','direccion','telefono','email','contacto','estatus'
                            ,'created_at','updated_at'];

    public function vehiculos()
    {
        return $this->hasMany('App\Vehiculo');
    }
}
