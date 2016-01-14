<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modelo extends Model
{
    protected $table =  'modelos';
    protected $fillable =   ['nombre','marca_id','created_at','updated_at'];

    public function marca()
    {
        return $this->belongsTo('App\Marca');
    }

    public function vehiculos()
    {
        return $this->hasMany('App\Vehiculo');
    }
}
