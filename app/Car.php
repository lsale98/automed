<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    // Table
    protected $table = 'cars';
    // Primary Key
    public $primaryKey = 'id';
    // Timestamps
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
