<?php
namespace App\Http\Controllers\Front\Training;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment\Comment;
use App\Models\User;
use App\Models\Training\TrainingResource;
use App\Models\Training\Like;
use Illuminate\Support\Facades\Session;
use App\Models\Training\TrainingLesson;
class TrainingController extends Controller
{
    public function get_trainings($id)
    {

        $data=  TrainingResource::with('user')->where('user_id',$id)->where('status',"Published")->get();
       foreach($data as $key=>$row){
        $data[$key]->total_like=Like::where("training_id",$row->id)->count();
        $data[$key]->user_like=Like::where("user_id",$id)->where("training_id",$row->id)->count();
        $data[$key]->comments=Comment::where("user_id",$id)->where("training_id",$row->id)->get()->toArray();
     }
       $response=array('response'=>$data->toArray());
        return json_encode($response);
    }

    public function all_training($id)
    {
     $data=  TrainingResource::with('user')->where('user_id','!=',$id)->where('status',"Published")->get();
     $response=array('response'=>$data->toArray());
        return json_encode($response);
    }
    public function othertrainings($id)
    {
        $data=  TrainingResource::with('user')->where('user_id','!=',$id)->where('status',"Published")->get();
       foreach($data as $key=>$row){
        $data[$key]->total_like=Like::where("training_id",$row->id)->count();
        $data[$key]->user_like=Like::where("user_id",$id)->where("training_id",$row->id)->count();
        $data[$key]->comments=Comment::where("user_id",$id)->where("training_id",$row->id)->get()->toArray();
         $data[$key]->user=User::where("id",$row->user_id)->get()->toArray();
     }
       $response=array('response'=>$data->toArray());
        return json_encode($response);
    }

    public function trainingdetail($id)
    {
        $data = TrainingResource::with('lessons','user')->where("id",$id)->first();
        $data->total_like=Like::where("training_id",$id)->count();
        $data->total_comments=Comment::where("training_id",$id)->count();
        $response=array('response'=>$data->toArray());
        return json_encode($response);
    }
    public function lesson_detail($id)
    {
          $data =  TrainingLesson::where("id",$id)->first();
           $response=array('response'=>$data);
        return json_encode($response);
    }
}
?>
