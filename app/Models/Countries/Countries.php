<?php

namespace App\Models\Countries;
use Illuminate\Database\Eloquent\Model;

class Countries extends Model

{
    protected $guarded = array();
    protected $table = 'countries';

    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id', 'id');
    }

}

?>