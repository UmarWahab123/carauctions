<?php
namespace App\Http\Controllers\Front\Training;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment\Comment;
use App\Models\User;
use App\Models\Training\TrainingResource;
use App\Models\Training\Like;
use Illuminate\Support\Facades\Session;

class LikeController extends Controller
{
    
    public function save_like(Request $request){
        $data=$request->all();
        unset($data['comment']);
        $affected_rows = Like::create($data);
        $response=array('response'=>$data);
        return json_encode($response);
    }
    public function dislike(Request $request){
        $data=$request->all();
        unset($data['comment']);
        $affected_rows = Like::where('user_id',$data['user_id'])->where('training_id',$data['training_id'])->delete();
        $response=array('response'=>$data);
        return json_encode($response);
    }
}
?>
