<?php
namespace App\Models\Bookmark;
use App\Models\Lot\Lot;
use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
    protected $guarded = array();

    protected $table = 'bookmarks';
    public function lot()
    {
        return $this->hasOne(Lot::class, 'id', 'lot_id');
    }
    // public function receiveruser()
    // {
    //     return $this->belongsTo(User::class, 'receiver', 'id')->select('id','name','email','dp');
    // }
}

