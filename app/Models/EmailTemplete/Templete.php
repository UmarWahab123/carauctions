<?php



namespace App\Models\EmailTemplete;

use Illuminate\Database\Eloquent\Model;

use Auth;

class Templete extends Model



{

    protected $guarded = array();

    protected $table = 'email_templete';


    public function placebidtemplete($lotdata,$bidinfo){
       $userinfo=Auth::user(); 
       $langcode="EN";
       $templete=Templete::where('langcode', $langcode)->where('title','Place bid')->first();
    }

}



?>
