<?php
namespace App\Models\Buynow;
use App\Models\Lot\Lot;
use App\Models\Auction\Auction;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Buynow extends Model
{
    protected $guarded = array();

    protected $table = 'buy_now';
   public function user(){
     return $this->belongsTo(User::class, 'user_id', 'id');
    }

   
    public function lotname(){
     return $this->belongsTo(Lot::class, 'lot_id', 'id');
    
    }
    public function auction(){
        return $this->belongsTo(Auction::class, 'auction_id', 'id');

    }
}

