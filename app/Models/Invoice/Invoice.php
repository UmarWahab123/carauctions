<?php

namespace App\Models\Invoice;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model

{
    protected $guarded = array();
    protected $table = 'invoice';

    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id', 'id');
    }

}

?>

