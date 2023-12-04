<?php
namespace App\Http\Controllers\Chat;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Training\ClassRoom;
use App\Models\Chat\Message;
use Auth;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Session;

class ChatController extends Controller
{

	public function chats()

	{
        $data['msg']=[];
        $data['users'] =  User::where('id','!=',Auth::user()->id)->get();
        foreach ($data['users'] as $key=>$value){
            $id=$value->id;
            $messages=Message::with('senderuser','receiveruser')
                ->where(function($query) use ($id)
                {
                    $query->where('sender',$id)->where('receiver',Auth::user()->id);
                })->orwhere(function($query) use ($id)
                {
                    $query->where('receiver',$id)->where('sender',Auth::user()->id);
                })
                ->orderBy('created_at','desc')->first();
            $value->msg='';
            $value->time='';
            if($messages){
                $value->msg=strip_tags($messages->message);
                $value->time=date('h:i A',strtotime($messages->created_at));
            }
        $value->count=Message::where("receiver",Auth::user()->id)->where('sender',$value->id)->where('readWriteStatus',0)->count();


        }
    //    dd($data['users']);
		return view("chats.index",compact('data'));
	}

	 public function getusermessage($id){
       // dd($id);

        Message::where("receiver",Auth::user()->id)->where('sender',$id)->where('readWriteStatus',0)->update(array("readWriteStatus"=>1));
        $messages=Message::with('senderuser','receiveruser')
            ->where(function($query) use ($id)
            {
                $query->where('sender',$id)->where('receiver',Auth::user()->id);
            })->orwhere(function($query) use ($id)
            {
                $query->where('receiver',$id)->where('sender',Auth::user()->id);
            })
            ->orderBy('created_at')->get();


        $data['msg']=$this->bindmsg($messages,0);
         $data['chatuser']=User::find($id);
        // dd($data['msg']);
        $messages= view('chats.chat-content',compact('data'))->render();
        $chatheader= view('chats.chat-header',compact('data'))->render();
//                 dd($response);
         $response=array('messages'=>$messages,'chatheader'=>$chatheader);
        return json_encode($response);
    }

    public function bindmsg($messages,$pusher){
            $msgData=[];
            $count=0;
            $old_sender=-1;
            foreach ($messages as $key => $value) {
                if($old_sender!=$value->sender){
                      $count++;
                      $msgData[$count]=new \StdClass();
                      $msgData[$count]->messages[$key]=new \StdClass();
                    }
                //  echo $old_sender.'<Br>';
                //  echo $count.'<Br>';
                //  echo $value->sender.'<Br>';
            $msgData[$count]->messages[$key]=$value->message;
            $msgData[$count]->userdp=$value->senderuser->dp;
            $msgData[$count]->time_ago=time_ago($value->created_at);
            $msgData[$count]->sender=$value->sender;
            $msgData[$count]->chatclass=Auth::user()->id==$value->sender ? 'sent' : 'receive';
            $old_sender=$value->sender;
            if($pusher==1){
                $msgData[$count]->chatclass='receive';
            }
        }
        // dd($msgData);
        return $msgData;
    }
    public function sendmessage(Request $request){
        $data=$request->all();
        $to=$request->receiver;
        $count=$request->count;
        unset($data['count']);
        $modal=Message::Create($data);
        if($count > 0){
            $response=$request->message;
        }else{
            $messages=Message::with('senderuser','receiveruser')->where('id',$modal->id)->get();
            $data['msg']=$this->bindmsg($messages,1);
            $response= view('chats.chat-content',compact('data'))->render();
        }
        $response=array('response'=>$response,'sender'=>$request->sender,'count'=>$count);
        // dd($response);
        $response=json_encode($response);
        $pusher=get_pusher();
        $pusher->trigger('chat', 'chatevent'.$to, $response);
        $pusher->trigger('chat', 'chatevent', $response);
        return 1;
    }

    public function chatuser($id)
    {
         $data['usermodal']=User::where('id',$id)->first();
         $modal= view('chats.chatusermodal',compact('data'))->render();
         $response=array('modal'=>$modal);
        return json_encode($response);
    }

    public function adminlogout(Request $request){
        $user=Auth::user();
        Auth::logout();
        Session::flush();
        return redirect('admin/login');  
    }
    public function chat(){
        return view('test.test');
    }
 
}

?>
