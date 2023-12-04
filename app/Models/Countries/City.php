<?php

namespace App\Models\Countries;
use Illuminate\Database\Eloquent\Model;

class City extends Model

{
    protected $guarded = array();
    protected $table = 'cities';

    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id', 'id');
    }

}

?>