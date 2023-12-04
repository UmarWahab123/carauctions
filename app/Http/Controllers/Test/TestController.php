<?php
namespace App\Http\Controllers\Test;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App;
use App\Models\Test\Settings;
use App\Models\Test\Question;
use App\Models\Test\Result;
use App\Models\Test\ResultItem;
use App\Models\Test\Language;
use App\Models\Test\LanguageTranslations;
use App\Models\Test\QuestionTranslations;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;
class TestController extends Controller
{
    public function checkcookie($data,$type){
        // dd($type);
        if($data->r1==$type){
          $result=array('mean'=>$data->v1*3/100,'likelyhood'=>$data->v1);  
        }
        else if($data->r2==$type){
          $result=array('mean'=>$data->v2*3/100,'likelyhood'=>$data->v2);  
        }
        else if($data->r3==$type){
            $result=array('mean'=>$data->v3*3/100,'likelyhood'=>$data->v3);  
          }
          else if($data->r4==$type){
            // dd('sdf');
            $result=array('mean'=>$data->v4*3/100,'likelyhood'=>$data->v4);  
          }
          else if($data->r5==$type){
            $result=array('mean'=>$data->v5*3/100,'likelyhood'=>$data->v5);  
          }
          else if($data->r6==$type){
            $result=array('mean'=>$data->v6*3/100,'likelyhood'=>$data->v6);  
          }
          else if($data->r7==$type){
            $result=array('mean'=>$data->v7*3/100,'likelyhood'=>$data->v7);  
          }
          else if($data->r8==$type){
            $result=array('mean'=>$data->v8*3/100,'likelyhood'=>$data->v8);  
          }
          else if($data->r9==$type){
            $result=array('mean'=>$data->v9*3/100,'likelyhood'=>$data->v9);  
          }
          return (object)$result;
    }
    public function check_reverse($is_reverse,$answer){
      if($is_reverse==1){
        if($answer==0){
          $result=3;
        } 
        elseif($answer==1){
          $result=2;
        } 
        elseif($answer==2){
          $result=1;
        }
        elseif($answer==3){
          $result=0;
        }
      }
      else{
        $result=$answer;
      }
      return $result;
    }
    public function calculate_mean($data)
    {
      $total=0.0;
      foreach ($data as $key => $value) {
        $value->answer=$this->check_reverse($value->is_reverse,$value->answer);
        $total +=(float)$value->answer;
      }
      // dd($data);
      $entries=count($data);
      if($entries==0){
        $entries=1;
      }
      $mean=$total/$entries;
      $mean=  number_format((float)$mean, 2, '.', '');
      return $mean;
    } 
    public function calculate_sd($data)
    {
       $mean=$this->calculate_mean($data);
       $x=[];
       // dd($data);
       $total=0.0;
       foreach ($data as $key => $value) {
        $value->answer=$this->check_reverse($value->is_reverse,$value->answer);
        $result=$value->answer-$mean;
        $result=$result*$result;
        $x[]=abs($result);
        $total +=abs($result);
       }
      $entries=count($data);
      if($entries > 1){
        $entries=$entries-1;
      }
      if($entries==0){
        $entries=1;
      }

      $final=$total/$entries;
      $final=  number_format((float)sqrt($final), 2, '.', '');
      return $final;
    }
    public  function maintest(){
        $data['page_title'] = "Personality Test";
        $data['settings']=Settings::first();
        $data['questionstypeA']=QuestionTranslations::get_type_questions('A');
        $data['questionstypeB']=QuestionTranslations::get_type_questions('B');
        $data['testresults']=Result::with('items')->get();
        $data['languages']=Language::get();
        foreach($data['languages'] as $key=>$value){
          $translations=LanguageTranslations::where('lang_id',$value->langid)->first();
          $data['languages'][$key]['translations']=$translations;
        }
        return view('test.index',compact('data'));
    }
    public  function exportresults(){
      $data['page_title'] = "Personality Test";

      $data['testresults']=Result::with('items')->get();
      $data['question_columns']=120;
      foreach($data['testresults'] as $key=>$value){
          $mean=json_decode($value->mean);
          $sd=(array)(json_decode($value->sd));
          for($i=1; $i<=9; $i++){
              $res=$this->checkcookie($mean,$i);
              $items=ResultItem::where('result_id',$value->id)->where('personality_id',$i)
                                 ->where('type','A')->get();
              $items2=ResultItem::where('result_id',$value->id)->where('personality_id',$i)
                                ->get();
              $data['testresults'][$key]['t'.$i.'sd']=$sd[1];
              $data['testresults'][$key]['t'.$i.'excluded']=(($value->winner_id==$i || $value->mostlikely==$i ) ? 'No' : 'Yes');
              $data['testresults'][$key]['t'.$i.'excludedRound']='NA';
              $data['testresults'][$key]['t'.$i.'mostLikely']=$value->mostlikely==$i ? 'Yes' : 'No';
              $data['testresults'][$key]['t'.$i.'main']=$value->winner_id==$i ? 'Yes' : 'No';
              $data['testresults'][$key]['t'.$i.'meansBefore3']=$this->calculate_mean($items);
              $data['testresults'][$key]['t'.$i.'mean']=$this->calculate_mean($items2);
              $data['testresults'][$key]['t'.$i.'sdBefore3']=$this->calculate_sd($items);
              $data['testresults'][$key]['t'.$i.'Likelyhood']=$res->likelyhood;
          }
          $data['testresults'][$key]['id']=$mean->tid;
      }
      return view('test.results',compact('data'));
    }
    public function savesettings(Request $request){
        $id=$request->id;
        $data=$request->all();
        $action="Added";
        if($id){
            $action="Updated";
            $affected_rows = Settings::find($id)->update($data);
        }
        else{
            $modal =  Settings::create($data);
        }
        Session::put('message', set_message($modal,'Logic',$action));
        return redirect()->back();
    }
    public function daterange($request){
      $startdate="1975-11-11";
      $enddate="2099-11-11";
      if($request->startdate){
          $startdate=db_format_date($request->startdate);
      }
      if($request->enddate){
          $enddate=db_format_date($request->enddate);
      }
      return (object) array('startdate'=>$startdate,'enddate'=>$enddate);
  }

    public  function exporttest(Request $request){
      $range=$this->daterange($request);
      $startdate=$range->startdate;
      $enddate=$range->enddate;
      $data['testresults']=Result::whereDate('created_at','>=',$startdate)
                    ->whereDate('created_at','<=',$enddate)
                            ->get();
      $data['question_columns']=120;
      foreach($data['testresults'] as $key=>$value){
          $mean=json_decode($value->mean);
          $sd=(array)(json_decode($value->sd));
          // dd($res);
          for($i=1; $i<=9; $i++){
              $res=$this->checkcookie($mean,$i);
              $items=ResultItem::where('result_id',$value->id)->where('personality_id',$i)
                                 ->where('type','A')->get();
              $items2=ResultItem::where('result_id',$value->id)->where('personality_id',$i)
                                 ->get();
              // $data['testresults'][$key]['t'.$i.'mean']=$res->mean;
              $data['testresults'][$key]['t'.$i.'sd']=$sd[1];
              $data['testresults'][$key]['t'.$i.'excluded']=(($value->winner_id==$i || $value->mostlikely==$i ) ? 'No' : 'Yes');
              $data['testresults'][$key]['t'.$i.'excludedRound']='NA';
              $data['testresults'][$key]['t'.$i.'mostLikely']=$value->mostlikely==$i ? 'Yes' : 'No';
              $data['testresults'][$key]['t'.$i.'main']=$value->winner_id==$i ? 'Yes' : 'No';
              $data['testresults'][$key]['t'.$i.'mean']=$this->calculate_mean($items2);
              $data['testresults'][$key]['t'.$i.'meansBefore3']=$this->calculate_mean($items);
              $data['testresults'][$key]['t'.$i.'sdBefore3']=$this->calculate_sd($items);
              $data['testresults'][$key]['t'.$i.'Likelyhood']=$res->likelyhood;
          }
          $data['testresults'][$key]['id']=$mean->tid;
          // dd(count($value->items));
      }
        $response= view('test.partials.export',compact('data'))->render();
        $response=array('response'=>$response);
        return json_encode($response);
    }
    public function deletedetach($id){
        $affected_rows = Detach::find($id)->delete();
        Session::put('message', set_message($affected_rows,'Detach','deleted'));
        return redirect()->back();
    }
}