<?php
namespace App\Http\Controllers\Test;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App;
use App\Models\Test\Personality;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;
class PersonalityController extends Controller
{
    public  function personality($id=-1){
        $data['page_title'] = "Add Personalities";
        if($id!=-1){
            $data['page_title'] = "Update Personalities";
            $data['results']=Personality::where('id', $id)->first();
            check_empty($data['results'],'detaches');
        }
        return view('personality.save',compact('data'));
    }
    public function savepersonality(Request $request){
        $id=$request->id;
        $data=$request->all();
        $action="Added";
        if($id){
            $action="Updated";
            $affected_rows = Personality::find($id)->update($data);
        }
        else{
            $affected_rows =  Personality::create($data);
        }
        Session::put('message', set_message($affected_rows,'Personality',$action));
        return Redirect('/admin/personalities');

    }
    public  function personalities(){
        $data['page_title'] = "Personalities";
        $data['results'] =  Personality::get();
        return view('personality.index',compact('data'));
    }
    public function deletepersonality($id){
        $affected_rows = Personality::find($id)->delete();
        Session::put('message', set_message($affected_rows,'Personality','deleted'));
        return redirect()->back();
    }
}
