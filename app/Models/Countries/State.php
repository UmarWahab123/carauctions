<?php

namespace App\Models\Countries;
use Illuminate\Database\Eloquent\Model;

class State extends Model

{
    protected $guarded = array();
    protected $table = 'states';

    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id', 'id');
    }

}

?>