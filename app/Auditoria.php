<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Auditoria extends Model
{
    protected $table = 'auditorias';
    protected $fillable = ['content', 'user_id', 'created_at'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
