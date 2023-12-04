<?php

namespace App\Models\Test;
use Illuminate\Database\Eloquent\Model;
use App\Models\Test\ResultItem;

class Result extends Model

{
    protected $guarded = array();
    protected $table = 'results';

    public function items()
    {
        return $this->hasMany(ResultItem::class, 'result_id', 'id');
    }


}









