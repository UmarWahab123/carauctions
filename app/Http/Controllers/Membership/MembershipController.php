<?php
namespace App\Http\Controllers\Membership;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Membership\Membership;
use Illuminate\Support\Facades\Session;

class MembershipController extends Controller
{
    public function memberships(){

        $data['results'] =  Membership::get();
        return view('membership.index',compact('data'));
    }

    public function savemembership(Request $requests)
    {
        $id=$requests->id;
        $data=$requests->all();

        $action="Added";
        // dd($data);
        if($id){
           $action="Updated";
        //    dd($id);
           $modal=Membership::find($id);
           $affected_rows=$modal->update($data);
        }else{
            $affected_rows=Membership::create($data);
        }
        $message=   set_message($affected_rows,'Membership',$action);
        Session::put('message', $message);
        return Redirect('/memberships');
    }
    public function membership($id=-1){
        $data['page_title'] = "Add Memebrship";
        // $data['results'] =  Membership::get();
         if($id){
             $data['page_title']="Update Membership";
             $data['results']=Membership::where('id',$id)->first();
         }
         return view('membership.save',compact('data'));
    }

    public function deletemembership($id){
        $affected_rows = Membership::find($id)->delete();
        $message=   set_message($affected_rows,'Membership','Deleted');
        Session::put('message', $message);
        return Redirect('/admin/memberships');
    }

      public function get_membership(){

        $data =  Membership::get();
         $response = array('response' => $data);
           //dd($data);
          return json_encode($response);
    }
}

?>
