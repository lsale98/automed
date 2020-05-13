<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $table = 'cars';
    public $primaryKey = 'id';
    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function servicer()
    {
        return $this->belongsTo('App\Servicer');
    }

    public function repairs()
    {
        return $this->hasMany('App\Repair');
    }
}
