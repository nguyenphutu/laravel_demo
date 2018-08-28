<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    protected $table='students';
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
