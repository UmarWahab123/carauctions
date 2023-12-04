<?php

namespace App\Models\Faqs;
use Illuminate\Database\Eloquent\Model;

class Faqs extends Model

{
    protected $guarded = array();
    protected $table = 'faqs';

    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id', 'id');
    }

}

?>


