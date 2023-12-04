<?php

namespace App\Models\Deposit;
use Illuminate\Database\Eloquent\Model;

class Deposit extends Model

{
    protected $guarded = array();
    protected $table = 'deposits';

    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id', 'id');
    }

}

?>

