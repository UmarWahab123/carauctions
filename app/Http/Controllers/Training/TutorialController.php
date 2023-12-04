<?php
namespace App\Http\Controllers\Training;
use App\Http\Controllers\Controller;
use App\Models\Comment\Comment;
use Illuminate\Http\Request;
use App\Models\Training\TrainingResource;
use App\Models\Training\TrainingLesson;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\Training\CourseTask;
use App\Models\Training\Like;
use Auth;
class TutorialController extends Controller
{
    public function trainings($type)
    {
        $data['page_title'] = "Update Settings";

        $data['results'] =  TrainingResource::with('user')->where('type',$type)->get();
        return view('training.tutorial.index' ,compact('data','type'));
    }
      public function alltrainings()
    {
        $data['page_title'] = "All Trainings";
        return view('training.alltrainings.index',compact('data'));
    }
        public function getalltraining($type)
    {

        $data['published'] =  TrainingResource::with('user')->where('type',$type)->where('status',"Published")->get();
        $data['unpublished'] =  TrainingResource::with('user')->where('type',$type)->where('status',"Unpublished")->get();
       // dd($type);

         $modal= view('training.alltrainings.table',compact('data','type'))->render();
        $response=array('response'=>$modal);
        return json_encode($response);
    }
    public function training($type,$id=-1){
        $data['page_title']="Add ".$type;
           $data['users'] =  User::get();
        // dd($data['users']);
        $tags=[];
        if($id!=-1){
            $data['page_title']="Update ".$type;
            $data['results'] =  TrainingResource::where("id",$id)->first();
            $tags=explode(',', $data['results']->tags);
        }
        return view('training.tutorial.save',compact('data','tags','type'));
    }
    public function savetraining(Request $request)
    {
        $id = $request->id;
        $modal = new TrainingResource;
        $data = $request->all();
        $data['tags']=!empty($request->tags) ?  implode(',',$request->tags) : '';
//        dd($data);
        $action = "Added";
        if ($id) {
            $action = "Updated";
            $modal = TrainingResource::find($id);
            $affected_rows = $modal->update($data);
        } else {

            $affected_rows =  $modal::create($data);
        }
        $message=   set_message($affected_rows,$request->type,$action);
        Session::put('message', $message);
        return Redirect('/admin/trainings/'.$request->type);
    }
    public function trainingdetail($id=-1){
         $data['results'] = TrainingResource::with('lessons','user')->where("id",$id)->first();
         $data['pages'] =  TrainingLesson::where("training_id",$id)->get();

        return view('training.tutorial.detail',compact('data'));
    }
    public function deletetraining($id)
    {
        $affected_rows = TrainingResource::find($id)->delete();
        $message=   set_message($affected_rows,'Training','Deleted');
        Session::put('message', $message);
        return redirect()->back();
    }
    public function upload_file2(Request $request){
        // if ($request->hasfile('file')) {
            $file = $request->file('file');
            // dd(  $file);
            $extension = $file->getClientOriginalExtension();
            $filename = time() . "." . $extension;
            $file->move('uploads/tutorials/', $filename);
            $data['upload_file'] = '/uploads/tutorials/' . $filename;
            // dd($data['upload_file']);
            return response()->json(['success'=>$filename]);
            // return $filename;

        // }
    }
   
}
?>
