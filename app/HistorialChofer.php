<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HistorialChofer extends Model
{
    protected $table    =   'historialchoferes';
    protected $fillable =   ['motivo','estatus','fecha','chofer_id','vehiculo_id'
                            ,'created_at','updated_at'];
    public function chofer()
    {
        return $this->belongsTo('App\Chofer');
    }

    public function vehiculo()
    {
        return $this->belongsTo('App\Vehiculo');
    }

}
