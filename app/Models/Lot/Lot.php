<?php

namespace App\Models\Lot;

use App\Models\User;

use App\Models\Auction\Auction;

use App\Models\Model\Models;
use App\Models\Lot\FileUpload;



use Illuminate\Database\Eloquent\Model;



class Lot extends Model

{

    protected $guarded = array();

     protected $with = ['gallery'];

    protected $table = 'lot';

    public function lot()

    {

        return $this->belongsTo(Auction::class, 'auction_id', 'id');

    }

    public function model()

    {

        return $this->belongsTo(Models::class, 'model_id', 'id');

    }
    public function gallery()

    {

        return $this->hasMany(FileUpload::class, 'lot_id', 'id');

    }

   

}





