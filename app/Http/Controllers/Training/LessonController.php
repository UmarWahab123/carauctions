<?php
namespace App\Http\Controllers\Training;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Training\TrainingLesson;
use App\Models\Training\TrainingResource;
use Illuminate\Support\Facades\Session;
use App\Models\Training\CourseTask;

class LessonController extends Controller
{
    public function page($training_id,$id=-1){
        $data['page_title']="Add Page";
        $tags=[];
        if($id!=-1){
            $data['page_title']="Update Page";
            $data['results'] =  TrainingLesson::where("id",$id)->first();
            $data['course_task'] =  CourseTask::where("page_id",$id)->get();
            //dd( $data['course_task']);
            $tags=explode(',', $data['results']->tags);
        }
        $data['training']=TrainingResource::where('id',$training_id)->first();
         $data['course_task'] =  CourseTask::where("page_id",$id)->get();
        $data['training_id']=$training_id;
        return view('training.tutorial.lessons.save',compact('data','tags'));
    }
    
    public function lessondetail(Request $request){
        $data['lead_id']=$request->lead_id;
        $data['type']=$request->type;
        if($data['type']=='course'){
        $data['course_task'] =  CourseTask::where("page_id",$request->id)->get();
      //  dd($data['course_task']);
        }
        $data['results']=TrainingLesson::where('id', $request->id)->first();
        $modal= view('training.tutorial.lessons.detail',compact('data'))->render();
        $response=array('response'=>$modal);
        return json_encode($response);
    }
    public function savelesson(Request $request){
        $id=$request->id;
        $data=$request->all();
        $item  = [];
        $olditem = [];
        $removed_entries = [];
         // dd($data);
        if (isset($data['item'])) {
            $item = $data['item'];
            unset($data['item']);
        }

        if (isset($data['olditem'])) {
            $olditem = $data['olditem'];
            unset($data['olditem']);
        }
        if (isset($data['removed_entries'])) {
            $removed_entries = $data['removed_entries'];
            unset($data['removed_entries']);
        }
        $data['tags']=!empty($request->tags) ?  implode(',',$request->tags) : '';

        if (!empty($removed_entries)) {
      

            CourseTask::whereIn('id', $removed_entries)->delete();
        }
        $action="Added";
        if($id){
            $action="Updated";
            $affected_rows = TrainingLesson::find($id)->update($data);
        }
        else{
            $affected_rows =  TrainingLesson::create($data);
            $id=$affected_rows->id;            
        }
        foreach ($olditem as $key => $value) {
                  CourseTask::where('id', $value['id'])->update($value);
                }
         foreach ($item as $key => $value) {
                $value['page_id']= $id;
               CourseTask::create($value);
            }
        $message=   set_message($affected_rows,'Page',$action);
        Session::put('message', $message);
        return redirect('admin/trainingdetail/'.$request->training_id);
//        $results=TrainingLesson::where('training_id', $request->training_id)->get();
//        $results= view('training.tutorial.lesson.index',compact('results'))->render();
//        $response=array('response'=>$results);
//        return json_encode($response);
    }
    public function deletelesson($id){
        $affected_rows = TrainingLesson::find($id)->delete();
        Session::put('message', set_message($affected_rows,'Page','deleted'));
        return redirect()->back();
    }
}
