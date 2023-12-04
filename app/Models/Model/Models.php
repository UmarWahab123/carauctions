<?php

namespace App\Models\Model;
use Illuminate\Database\Eloquent\Model;

class Models extends Model

{
    protected $guarded = array();
    protected $table = 'model';
     public function model()
    {
        return $this->belongsTo('App\Models\Model\Make', 'make_id', 'id');
    }

}

?>

