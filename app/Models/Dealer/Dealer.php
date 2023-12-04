<?php



namespace App\Models\Dealer;
use App\Models\Auction\Auction;

use App\Models\Model\Models;

use Illuminate\Database\Eloquent\Model;



class Dealer extends Model



{

    protected $guarded = array();

    protected $table = 'dealer';

     public function lot()

    {

        return $this->belongsTo(Auction::class, 'auction_id', 'id');

    }

    public function model()

    {

        return $this->belongsTo(Models::class, 'model_id', 'id');

    }

}



?>



