<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chofer extends Model
{
    protected $table    =   'choferes';
    protected $fillable =   ['numero','ci','edad','nombre','telefono','telefono2','estadocivil'
                            ,'estatus','fechaingreso','vencelicencia','fechanacimiento'
                            ,'direccion','contrato','vencecontrato','contacto'
                            ,'parentesco','telefonocontacto','provincia_id','licencia_id'
                            ,'created_at','updated_at'];

    public function provincia()
    {
        return $this->belongsTo('App\Provicia');
    }

    public function licencia()
    {
        return $this->belongsTo('App\Licencia');
    }

    public function historialchoferes()
    {
        return $this->hasMany('App\HistorialChofer');
    }
}
