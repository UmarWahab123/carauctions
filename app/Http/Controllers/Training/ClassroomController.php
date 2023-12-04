<?php
namespace App\Http\Controllers\Training;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Training\ClassRoom;
use Illuminate\Support\Facades\Session;

class ClassroomController extends Controller
{
    public function classrooms(Request $request)
    {
        $data['results'] =  ClassRoom::get();
        //  dd(  $data['results']);
        return view('training.classroom.index' ,compact('data'));

    }

   public function classroom($id=-1){
    $data['page_title'] = "Add Classroom";
    if($id!=-1){
        $data['page_title']="Update Classroom";
        $data['results'] =  ClassRoom::where("id",$id)->first();

    }
     return view("training.classroom.save",compact('data'));
   }

    public function saveclassroom(Request $request)
    {
        $id = $request->id;
        $modal = new ClassRoom;
        $data = $request->all();
        //  dd($data);
        $action = "Added";
        if ($id) {
            $action = "Updated";
            $modal = ClassRoom::find($id);
            $affected_rows = $modal->update($data);
        } else {

            $affected_rows =  $modal::create($data);
        }
        $message=   set_message($affected_rows,'Class Room',$action);
        Session::put('message', $message);
        return Redirect('/admin/classrooms');

    }
    public function deleteclassroom($id)
    {
        $affected_rows = ClassRoom::find($id)->delete();
        $message=   set_message($affected_rows,'Class Room','Deleted');
        Session::put('message', $message);
        return redirect()->back();
    }
    public function todaytrainning(){
     $data['page_title'] = "Trainings";
     return view("training.alltrainings.view",compact('data'));
    }
}
?>
