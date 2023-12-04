<?php

namespace App\Models\Invoice;
use Illuminate\Database\Eloquent\Model;

class InvoiceItem extends Model

{
    protected $guarded = array();
    protected $table = 'invoice_item';

    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id', 'id');
    }

}

?>

