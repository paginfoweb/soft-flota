<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    protected $table = 'vehiculos';
    protected $fillable =   ['numero','placa','ano','chasis','serial','cupo','fechacupo','poliza'
                            ,'polizacompra','polizavence','revision','gps','radio','estatus'
                            ,'financiado','cuotasfinanciamiento','cobrar','tarifa_id','propietaria_id'
                            ,'modelo_id','created_at','updated_at'];

    public function tarifa()
    {
        return $this->belongsTo('App\Tarifa');
    }

    public function propietaria()
    {
        return $this->belongsTo('App\Propietaria');
    }

    public function modelo()
    {
        return $this->belongsTo('App\Modelo');
    }

    public function historialchoferes()
    {
        return $this->hasMany('App\HistorialChofer');
    }
}
