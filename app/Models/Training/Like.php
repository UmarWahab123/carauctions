<?php
namespace App\Models\Training;
use Illuminate\Database\Eloquent\Model;

class Like extends Model

{
    protected $guarded = array();
    protected $table = 'likes';
    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id', 'id');
    }




}


?>






