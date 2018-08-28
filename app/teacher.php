<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $table='teacher';
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
