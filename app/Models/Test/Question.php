<?php

namespace App\Models\Test;
use Illuminate\Database\Eloquent\Model;
use App\Models\Test\Personality;
class Question extends Model

{
    protected $guarded = array();
    protected $table = 'questions';
    public function personality()
    {
        return $this->belongsTo(Personality::class, 'personality_id', 'id');
    }
     public function personalitystateA()
    {
        return $this->belongsTo(Personality::class, 'statement_a_pid', 'id');
    } 
    public function personalitystateB()
    {
        return $this->belongsTo(Personality::class, 'statement_b_pid', 'id');
    }

}









