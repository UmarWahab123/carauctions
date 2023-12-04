<?php
namespace App\Http\Controllers\Front\Membership;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Membership\Membership;
use Illuminate\Support\Facades\Session;

class MembershipController extends Controller
{
  
      public function get_membership(){

        $data =  Membership::get();
         $response = array('response' => $data);
           //dd($data);
          return json_encode($response);
    }
}

?>
