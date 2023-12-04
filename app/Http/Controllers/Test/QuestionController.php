<?php
namespace App\Http\Controllers\Test;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App;
use App\Models\Test\Question;
use App\Models\Test\Personality;
use App\Models\Test\Language;
use App\Models\Test\LanguageTranslations;
use App\Models\Test\QuestionTranslations;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;
class QuestionController extends Controller
{
    public function setolddata(){
        // QuestionTranslations::get_data_translation(1);

        $data=Question::get();
        // dd($data);
            foreach($data as $key=>$value){
                $qdata=array(
                    'lang_id'=>1,
                    'question_id'=>$value->id,
                    'question'=>$value->question,
                    'statement_a_text'=>$value->statement_a_text,
                    'statement_b_text'=>$value->statement_b_text,
                      );
                QuestionTranslations::create($qdata);
            }
            dd('DONE');
        }
    public function questionmodal(Request $request){
        $data['type']=$request->type;
        $data['trans_id']=$request->trans_id;
        $data['results']=Question::where('id', $request->id)->first();
        $data['personalities']=Personality::get();
        // dd($data['results']);
        if($request->id > 0){
            $data['languages']=QuestionTranslations::get_data_translation($request->id);
        }else{
            $data['languages']=Language::where('status','Active')->get();
        }
        // dd($data['results']);
        if($request->type=="A"){
            $modal= view('test.questions.type_a_content',compact('data'))->render();
        }
        else{
            $modal= view('test.questions.type_b_content',compact('data'))->render();
        }
        $response=array('response'=>$modal);
        return json_encode($response);
    }
    public function savequestion(Request $request){
        $id=$request->id;
        $trans_id=$request->trans_id;
        $old_rank=$request->old_rank;
        $old_personality_id=$request->old_personality_id;
        $data=$request->all();
        if(isset($data['is_reverse'])){
            $data['is_reverse']=1;
        }
        else{
            $data['is_reverse']=0;
        }
        unset($data['old_rank']);
        unset($data['old_personality_id']);
        unset($data['trans_id']);
        $transalation=$data['transalation'];
        unset($data['transalation']);
        $action="Added";
        if($id){
            $action="Updated";
            if($request->type=='B'){
                if($request->rank!=$old_rank)
                {
                    $check=$this->checkrank($request);
                    if($check==1){
                       $response=array('status'=>0);
                          return json_encode($response);
                  }
                }
            }
              elseif($request->type=='A'){
                if($request->rank!=$old_rank || $request->personality_id!=$old_personality_id ){
                $check=$this->checkrank($request);
                  if($check==1){
                     $response=array('status'=>0);
                        return json_encode($response);
                }
                }
                }
                // dd($data);
            $affected_rows = Question::find($id)->update($data);
            foreach($transalation as $key=>$value){
                $transalation[$key]['question_id'] = $id;
                $transalation[$key]['question'] = isset($value['question']) ? $value['question'] : '';
                $transalation[$key]['statement_a_text'] = isset($value['statement_a_text']) ? $value['statement_a_text'] : '';
                $transalation[$key]['statement_b_text'] = isset($value['statement_b_text']) ? $value['statement_b_text'] : '';
                if($value['trans_id'] > 0){
                    QuestionTranslations::where('trans_id',$value['trans_id'])->update($transalation[$key]);
                }else{
                QuestionTranslations::create($transalation[$key]);
                }
            }
        }
        else{
                $check=$this->checkrank($request);
                if($check==1){
                     $response=array('status'=>0);
                      return json_encode($response);
                }
            $affected_rows =  Question::create($data);
            $id=$affected_rows->id;
            foreach($transalation as $key=>$value){
                $transalation[$key]['question_id'] = $id;
                $transalation[$key]['question'] = isset($value['question']) ? $value['question'] : '';
                $transalation[$key]['statement_a_text'] = isset($value['statement_a_text']) ? $value['statement_a_text'] : '';
                $transalation[$key]['statement_b_text'] = isset($value['statement_b_text']) ? $value['statement_b_text'] : '';
                QuestionTranslations::create($transalation[$key]);
            }
                // dd($transalation);
        }

        if($request->type=="A"){
        $results=QuestionTranslations::get_questions($id,$trans_id);
        $results->action=$action;
        $results= view('test.questions.a_view',compact('results'))->render();
        }
        else{
        // $results=Question::where('id', $id)->with('personalitystateA','personalitystateB')->first();
        $results=QuestionTranslations::get_questions($id,$trans_id);
        // dd($results);

        $results->action=$action;
        $results= view('test.questions.b_view',compact('results'))->render();
        }
        $response=array('response'=>$results,'status'=>1);
        return json_encode($response);
    }
    public function checkrank($request){
            // dd($request->type);
            $check=0;
            if($request->type=='A'){
                $condition=array('type'=>$request->type,'rank'=>$request->rank,'personality_id'=>$request->personality_id);
                $check=Question::where($condition)->count();
            }else{
                   $condition=array(
                    'type'=>$request->type,
                    'rank'=>$request->rank,
                    'statement_a_pid'=>$request->statement_a_pid,
                    'statement_b_pid'=>$request->statement_b_pid
                );
                   $condition2=array(
                    'type'=>$request->type,
                    'rank'=>$request->rank,
                    'statement_a_pid'=>$request->statement_b_pid,
                    'statement_b_pid'=>$request->statement_a_pid
                );
                $check=Question::where($condition)->count();
                // dd($check);
                if($check==0){
                     $check=Question::where($condition2)->count();
                }

            }



            return $check;

    }
    public function deletequestion($id){
        $affected_rows = Question::find($id)->delete();
        Session::put('message', set_message($affected_rows,'Question','deleted'));
        return redirect()->back();
    }
}
