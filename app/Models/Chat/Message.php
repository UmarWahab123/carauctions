<?php
namespace App\Models\Chat;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $guarded = array();

    protected $table = 'messages';
    public function senderuser()
    {
        return $this->belongsTo(User::class, 'sender', 'id')->select('id','name','email','dp');
    }
    public function receiveruser()
    {
        return $this->belongsTo(User::class, 'receiver', 'id')->select('id','name','email','dp');
    }
}


