<?php
namespace App\Http\Controllers\Comment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment\Comment;
use App\Models\User;
use App\Models\Training\TrainingResource;

use Illuminate\Support\Facades\Session;

class CommentController extends Controller
{
    public function save_comment(Request $request){
        $data=$request->all();
        //  dd($data);
        $affected_rows = Comment::create($data);
        $response=array('response'=>$data);
        return json_encode($response);
        // dd($data);
    }
}
?>
