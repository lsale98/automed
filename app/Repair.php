<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Repair extends Model
{

    protected $table = 'repairs';
    public $primaryKey = 'id';
    public $timestamps = true;

    public function car()
    {
        return $this->belongsTo('App\Car');
    }

    public function servicer()
    {
        return $this->belongsTo('App\Servicer');
    }
}
