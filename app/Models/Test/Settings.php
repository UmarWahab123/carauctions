<?php



namespace App\Models\Test;

use Illuminate\Database\Eloquent\Model;
use App\Models\Customer\Customer;


class Settings extends Model

{
    protected $guarded = array();
    protected $table = 'settings';

    public function customer()
    {
        return $this->belongsTo(Register::class, 'customer_id', 'id');
    }

}









