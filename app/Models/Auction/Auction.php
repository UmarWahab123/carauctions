<?php
namespace App\Models\Auction;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Auction extends Model
{
    protected $guarded = array();

    protected $table = 'auctions';
    public function senderuser()
    {
        return $this->belongsTo(User::class, 'sender', 'id')->select('id','name','email','dp');
    }
    public function receiveruser()
    {
        return $this->belongsTo(User::class, 'receiver', 'id')->select('id','name','email','dp');
    }
}


