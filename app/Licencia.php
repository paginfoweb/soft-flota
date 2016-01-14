<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Licencia extends Model
{
    protected $table    =   'licencias';
    protected $fillable =   ['type','created_at','updated_at'];

    public function choferes()
    {
        return $this->hasMany('App\Chofer');
    }
}
