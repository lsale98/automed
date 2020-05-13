<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    protected $table = 'comments';
    public $primaryKey = 'id';
    public $timestamps = true;

    public function servicer()
    {
        return $this->belongsTo('App\Servicer');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
