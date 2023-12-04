<?php
namespace App\Models\Bid;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use App\Models\Auction\Auction;
use App\Models\Lot\Lot;


class Bid extends Model
{
    protected $guarded = array();

    protected $table = 'bids';

    public function user(){
     return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function auction(){
        return $this->belongsTo(Auction::class, 'auction_id', 'id');

    }
    public function lotname(){
     return $this->belongsTo(Lot::class, 'lot_id', 'id');
    
    }
   
}


