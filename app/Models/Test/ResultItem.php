<?php

namespace App\Models\Test;
use Illuminate\Database\Eloquent\Model;
use App\Models\Test\Question;

class ResultItem extends Model

{
    protected $guarded = array();
    protected $table = 'result_items';
    protected $with = ['question'];

    public function question()
    {
        return $this->belongsTo(Question::class, 'question_id', 'id');
    }
}









