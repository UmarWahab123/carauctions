<?php
namespace App\Models\Training;
use Illuminate\Database\Eloquent\Model;

class TrainingResource extends Model

{
    protected $guarded = array();
    protected $table = 'training_resource';
    public function lessons()
    {
        return $this->hasMany('App\Models\Training\TrainingLesson', 'training_id', 'id');
    }

     public function user()
    {
        return $this->belongsTo('App\Models\User','user_id', 'id');
    }

}








