<?php

namespace App\Models\Comment;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model

{
    protected $guarded = array();
    protected $table = 'comments';

    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id', 'id');
    }

}

?>

