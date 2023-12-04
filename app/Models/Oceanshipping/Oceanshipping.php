<?php



namespace App\Models\Oceanshipping;

use App\Models\Groundshipping\Groundshipping;


use Illuminate\Database\Eloquent\Model;


class Oceanshipping extends Model



{

    protected $guarded = array();

    protected $table = 'ocean_shipping';

    public function oceanshipping()
    {
        return $this->belongsTo(Groundshipping::class, 'ground_id','id');
    }

}



?>





