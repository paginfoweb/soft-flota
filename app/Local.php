<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Local extends Model
{
    protected $table    =   'locales';
    protected $fillable =   ['nombre','direccion','telefono','contacto','estatus','type','created_at','updated_at'];

    public function users()
    {
        return $this->belongsToMany('App\User')->withTimestamps();
    }

}
