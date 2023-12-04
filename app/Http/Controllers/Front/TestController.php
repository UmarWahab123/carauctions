<?php
namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App;
use App\Models\Test\Settings;
use App\Models\Test\Question;
use App\Models\Test\Result;
use App\Models\Test\ResultItem;
use App\Models\Test\Language;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use App\Models\Test\QuestionTranslations;
use App\Models\Test\LanguageTranslations;
use App\Models\Test\Personality;

class TestController extends Controller
{
    public  function personalitytest($langcode='en'){
// dd(uniqid());
        $data['langcode'] =$langcode;
        $language=Language::where('langcode',$langcode)->first();
        $data['lang_id'] =isset($language->langid) ? $language->langid : 1;
        $translations=LanguageTranslations::where('lang_id',$data['lang_id'])->first();

        $data['page_title'] = $translations->page_title;
        $data['settings']=Settings::first();
        $data['questionstypeA']=Question::with('personality')->where('type','A')->get();
        $data['questionstypeB']=Question::with('personalitystateA','personalitystateB')->where('type','B')->get();
        // dd(  $data);

        return view('frontend.test.index',compact('data'));
    }

    public function testresult()
    {
        return view('frontend.test.testresult');
    }

    public function method0($allAnswers,$data){
        $personality=array();
        $allValuesAreTheSame = (count(array_unique($allAnswers)) === 1);
           $personalites=personalites();
         foreach ($data as $key => $value) {
          foreach ($personalites as $key => $value2) {
            if($key==$value['personality_id']){
              $personality[$value2]['responses'][]=$this->check_reverse($value['is_reverse'],$value['answer']);
              $personality[$value2]['id']=$key;
            }
          }
         }
          $meanArray=array();
          foreach ($personality as $key => $value)
          {
             $meanArray[]=$this->calculate_mean($value['responses']);
          }
        $samemean = (count(array_unique($meanArray)) === 1);

        if($allValuesAreTheSame==true){
           $response=(object)array('status'=>-1,'results'=>$allAnswers);
        }
         elseif($samemean==true){
           $response=(object)array('status'=>-1,'results'=>$allAnswers);
        }
        else{
           $response=(object)array('status'=>0,'results'=>$allAnswers);
        }
          return $response;
    }
    public function calculate_mean($data)
    {
      $total=0.0;
      foreach ($data as $key => $value) {
        $total +=(float)$value;
      }
      // dd($total);
      $entries=count($data);
      $mean=$total/$entries;
    $mean=  number_format((float)$mean, 2, '.', '');
      return $mean;
    }
     public function checksd(){
        $data=array(2,2,2,2,1,2);
        $response=$this->calculate_sd($data);
        dd($response);
    }

    public function calculate_sd($data)
    {
       $mean=$this->calculate_mean($data);
       $x=[];
       // dd($data);
       $total=0.0;
       foreach ($data as $key => $value) {
        $result=$value-$mean;
        $result=$result*$result;
        $x[]=abs($result);
        $total +=abs($result);
       }
      $entries=count($data);
      if($entries > 1){
      $entries=$entries-1;
      }

      $final=$total/$entries;
    $final=  number_format((float)sqrt($final), 2, '.', '');
      return $final;

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
    public function testcookie($meanArray,$personalites,$data,$settings,$discard,$sdArray,$winner_id,$mostlikely){
      $i=1;
      $cookieobj=new \stdClass();
      $result_no=uniqid();
      $cookieobj->tid=$result_no;
      arsort($meanArray);
      // dd($meanArray);
        foreach($meanArray as $key=>$value){
              $id=array_search($key,$personalites);
              $val=$value/3*100;

      //  dd($val);

              $v='v'.$i;
              $r='r'.$i;
              $cookieobj->$r=$id;
              $cookieobj->$v=round($val);
              $i++;
        }

         $result=$settings->toArray();
         unset($result['id']);
         unset($result['created_at']);
         unset($result['updated_at']);
         $result['result_no']=$result_no;
         $result['mean']=json_encode($cookieobj);
         $result['discarded']=json_encode($discard);
         $result['sd']=json_encode($sdArray);
         $result['winner_id']=$winner_id;
         $result['mostlikely']=$mostlikely;
        //  dd($result);
         $affected_rows=Result::create($result);
         $result['mean']=json_encode($cookieobj);
        foreach($data as $key=>$value){
         unset($value['statement_a_pid']);
         unset($value['statement_b_pid']);
         $value['result_id']=$affected_rows->id;
         ResultItem::create($value);
        //  dd($value);
        }
        $string="";
        $string='r1:'.$cookieobj->r1.',r2:'.$cookieobj->r2.',r3:'.$cookieobj->r3.',r4:'.$cookieobj->r4.',r5:'.$cookieobj->r5;
        $string.=',r6:'.$cookieobj->r6.',r7:'.$cookieobj->r7.',r8:'.$cookieobj->r8.',r9:'.$cookieobj->r9;
        $string.=',v1:'.$cookieobj->v1.',v2:'.$cookieobj->v2.',v3:'.$cookieobj->v3.',v4:'.$cookieobj->v4.',v5:'.$cookieobj->v5;
        $string.=',v6:'.$cookieobj->v6.',v7:'.$cookieobj->v7.',v8:'.$cookieobj->v8.',v9:'.$cookieobj->v9;
        $string.=',tid:'.$cookieobj->tid;
        $string=base64_encode($string);
        setcookie('pp-test-result', $string, time()+31556926, "/");
        return $result_no;
        //  dd($result);
      //  dd($cookieobj);
        // setcookie('pp-test-result', $cookieobj, time()+31556926, "/");
  //      dd($meanArray);
    }

    public function check_s1_qs($data,$rank,$stage,$settings){
        $personality=array();
        $discard=array();
        $personalites=personalites();
         foreach ($data as $key => $value) {
          foreach ($personalites as $key => $value2) {
            if($key==$value['personality_id']){
              $personality[$value2]['responses'][]=$value['answer'];
              $personality[$value2]['id']=$key;
            }
          }
         }
          foreach ($personality as $key => $value)
          {
            if(count($value['responses']) >= $settings->stage1_questions){
                $discard[]=$value['id'];
            }
          }
           $response=(object)array('discardper'=>$discard);
            return $response;
    }
     public function check_s2_qs($start,$end){
        $allowedranks=array();
        // $start=6;
        // $end=$start+$settings->stage2_questions;
        for ($i=$start; $i <=$end; $i++) {
                $allowedranks[]=$i;
        }
        // dd($allowedranks);
           $response=(object)array('allowedranks'=>$allowedranks);
            return $response;
    }
    public function method1($data,$rank,$stage,$alreadydiscarded,$dpArray){
      // dd($alreadydiscarded);
      $personality=array();
      $settings=Settings::first();
        $discard=array();
        $personalites=personalites();
         foreach ($data as $key => $value) {
          foreach ($personalites as $key => $value2) {
            if($key==$value['personality_id']){
              $personality[$value2]['responses'][]=$this->check_reverse($value['is_reverse'],$value['answer']);
              $personality[$value2]['id']=$key;
            }
          }
         }
          $meanArray=array();
          $meanArray2=array();
          $sdArray=array();
          if($alreadydiscarded){
            $discard=$alreadydiscarded;
          }

        foreach ($personality as $key => $value)
          {
             // dd($value['responses']);
             $personality[$key]['mean']=$this->calculate_mean($value['responses']);
             $personality[$key]['sd']=$this->calculate_sd($value['responses']);
              if($personality[$key]['mean'] < $settings->method1_value){
              // if(count($discard) < 7 && !in_array($value['id'], $alreadydiscarded)){
              //   $discard[]=$value['id'];
              // }
                if(!in_array($value['id'], $alreadydiscarded)){
                  $dpArray[$key]['rank']=$rank-1;
                  $dpArray[$key]['id']=$value['id'];
                }
              }
              $meanArray[$value['id']]=$personality[$key]['mean'];
              $meanArray2[$key]=$personality[$key]['mean'];
              $sdArray[$value['id']]=$personality[$key]['sd'];
          }
             $cookieArray=$meanArray2;
            asort($meanArray2);
            foreach($meanArray2 as $key=>$value){
              $id=array_search($key,$personalites);
              // dd($id);
              if($value < $settings->method1_value){
              if(count($discard) < 7 && !in_array($id, $alreadydiscarded)){
                $discard[]= $id;
              }
              }
            }
          //  dd($sdArray);

        if($stage==3){ //declaring winner
            asort($meanArray);
            end($meanArray);
            $firstkey = key($meanArray);

            unset($meanArray[$firstkey]);
            $secondValue = end($meanArray);
            end($meanArray);
            $secondkey = key($meanArray);



            $winner=ucfirst($personalites[$firstkey]);
            $result_id=   $this->testcookie($cookieArray,$personalites,$data,$settings,$discard,$sdArray,$firstkey,$secondkey);
            $response=(object)array('winner'=>$winner,'result_id'=> $result_id,'status'=>4,'results'=>$personality);
            return $response;
        }
        $m2response=$this->method2($meanArray,$settings,$rank,$sdArray,$discard);

         if($m2response->status==4){
            $winner=ucfirst($personalites[$m2response->winner]);
        $result_id=  $this->testcookie($cookieArray,$personalites,$data,$settings,$discard,$sdArray,$m2response->winner,$m2response->mostlikely);
            $response=(object)array('winner'=>$winner,'result_id'=> $result_id,'status'=>4,'results'=>$personality);
            // dd($response);
            return $response;
         }
         else{
          if($rank==99){
            $response=(object)array('discard'=>$discard,'dpArray'=>$dpArray,'status'=>5,'p1'=>$m2response->p1,'p2'=>$m2response->p2,'results'=>$personality);
           // dd($response);
            return $response;
            }
           // dd($response);
         }
         // dd($meanArray);
      $response=(object)array('discard'=>$discard,'dpArray'=>$dpArray,
        'status'=>1,'results'=>$personality);
        return $response;
    }
    public function method2($meanArray,$settings,$rank,$sdArray,$discard){
      foreach ($meanArray as $key => $value) {
        if(in_array($key, $discard)){unset($meanArray[$key]);}
      }
      foreach ($sdArray as $key => $value) {
        if(in_array($key, $discard)){unset($sdArray[$key]);}
      }

      asort($meanArray);
      asort($sdArray);
      // dd(array_key_first($sdArray));

      $origionalArray=$meanArray;
      $firstValue = end($meanArray);
      end($meanArray);
      $firstkey = key($meanArray);
      unset($meanArray[$firstkey]);

      $secondValue = end($meanArray);
      end($meanArray);
      $secondkey = key($meanArray);
      unset($meanArray[$secondkey]);

      $thirdValue=0;
      if(count($origionalArray) > 2){
          $thirdValue = end($meanArray);
          end($meanArray);
          $thirdkey = key($meanArray);
          unset($meanArray[$thirdkey]);
      }


      $res=$firstValue-$secondValue;
      $threshold=0;
      if($rank==99){
          $threshold= ($firstValue - $settings->threshold_value1)/$settings->threshold_value2;
      }
      // dd($res);
      if($res>=$settings->method2_value){
         $response=(object)array('winner'=>$firstkey,'mostlikely'=>$secondkey,'status'=>4);
      }
      else if($secondValue < $threshold&& $rank==99){
          // dd('adf');
         $response=(object)array('winner'=>$firstkey,'mostlikely'=>$secondkey,'status'=>4);
      }
      else{
        if($secondValue==$thirdValue){
          $secondkey=array_key_first($sdArray);
          if($firstkey==$secondkey){
            unset($sdArray[$secondkey]);
            $secondkey=array_key_first($sdArray);
          }
        }
        // dd($secondkey);
         $response=(object)array('status'=>0,'p1'=>$firstkey,'p2'=>$secondkey);
      }
        return $response;
    }

    public function progressbar($attempted,$discard,$settings,$dpArray){
      $stage1=9*$settings->stage1_questions;
      $stage2=9*$settings->stage2_questions;
      $stage3=$settings->stage3_questions;

      $total=$stage1+$stage2+$stage3;
      $discard=count($discard);
      if(empty($dpArray)){
         $discardquestions=$discard*$settings->stage2_questions;
         $rem_questions=$total-$discardquestions;
         }
         else{
              $totalranks=$settings->stage1_questions+$settings->stage2_questions;
              $discardquestions=0;
              foreach ($dpArray as $key => $value) {
                  $rem_ranks=$totalranks-$value['rank'];
                  $discardquestions =$discardquestions+$rem_ranks;
              }
              // dd($discardquestions);
         $rem_questions=$total-$discardquestions;
        }

      $total_answered=count($attempted);
      $barvalue=$total_answered/$rem_questions*100;
      $barvalue=round($barvalue);
      // echo "discard".$discard.'<br>';
      // echo "discardquestions".$discardquestions.'<br>';
      // echo "rem_questions".$rem_questions.'<br>';
      // echo "total".$total.'<br>';
      // echo "total_answered".$total_answered.'<br>';
      // dd($discardquestions);
      return $barvalue;


    }


    public function questionresponse(Request $request){
      // sfds
                    // dd(Session::get('discard'));
          $discard=$request->discard;
          $dpArray=$request->dpArray;
          $userResults=$request->userResults;
          $p1=$request->p1;
          $p2=$request->p2;
          $status=1;
          $settings=Settings::first();
          $stage1_maxrank=$settings->stage1_questions;
          $stage2_srank=$stage1_maxrank+1;
          $stage2_erank=$settings->stage1_questions+$settings->stage2_questions;
          $s3start=$stage2_erank+1;
          $condition=array('type'=>'A');

    			if($request->type == 'A' && $request->stage==1){
             $stageonelimit=  $this->check_s1_qs($request->userresponses,1,1,$settings);
       			 $results=Question::whereNotIn('id',$request->attempted)->whereNotIn('personality_id',$stageonelimit->discardper)->where('rank','<=',$stage1_maxrank)->where($condition)->orderBy('rank','asc')->first();
              if(!empty($results)){
                $results=QuestionTranslations::get_translation($results->id,$request->lang_id,$results);
              }
              // dd($results);
                    if(empty($results)){
                      $output=  $this->method0($request->allAnswers,$request->userresponses);
                      // dd($output);\\\\
                      $userResults=$output->results;
                        $rank=$request->rank+1;
                      if($output->status==-1){ //same response
                          $response=array('status'=>-1,'userResults'=>$userResults);
                          return response()->json($response);
                      }
                      else{
                            $output=  $this->method1($request->userresponses,$rank,2,$discard,$dpArray);
                              if($output->status==4){ //winner decided
                                 $response=array('status'=>4,'winner'=>$output->winner,'result_id'=>$output->result_id,'userResults'=>$userResults);
                                 return response()->json($response);
                            }
                            $discard=$output->discard;
                            $dpArray=$output->dpArray;
                             $userResults=$output->results;
                      }
                         $results=Question::whereNotIn('id',$request->attempted)->where('rank',$stage2_srank)->where($condition)->whereNotIn('personality_id',$discard)->orderBy('rank','asc')->first();
                         if(!empty($results)){
                          $results=QuestionTranslations::get_translation($results->id,$request->lang_id,$results);
                        }
                         $barvalue=$this->progressbar($request->attempted,$discard,$settings,$dpArray);
                        $response=array('response'=>$results,'discard'=>$discard,'dpArray'=>$dpArray,'status'=>1,
                          'rank'=>$stage2_srank,'stage'=>2,'userResults'=>$userResults,'barvalue'=>$barvalue);
                    }
                    else{
                              $barvalue=$this->progressbar($request->attempted,$discard,$settings,$dpArray);
                          $response=array('response'=>$results,'discard'=>$discard,'status'=>$status,'stage'=>1,'userResults'=>$userResults,'barvalue'=>$barvalue);
                    }
					           return response()->json($response);
    			}
                else if(($request->rank >=$stage2_srank && $request->rank <=$stage2_erank)  && $request->type == 'A'){

                         $s2limit=$this->check_s2_qs($stage2_srank,$stage2_erank);
                          // dd($s2limit->allowedranks);
                         $results=Question::with('personality')->whereNotIn('personality_id',$discard)->whereNotIn('id',$request->attempted)->where('rank',$request->rank)->where($condition)->orderBy('rank','asc')->first();
                         if(!empty($results)){
                          $results=QuestionTranslations::get_translation($results->id,$request->lang_id,$results);
                        }
                         if(empty($results)){

                            $rank=$request->rank+1;

                          if(!in_array($rank, $s2limit->allowedranks))
                              {$rank=99;}
                            $output=  $this->method1($request->userresponses,$rank,2,$discard,$dpArray);
                             if($output->status==4){ //if winner decided
                                 $response=array('status'=>4,'winner'=>$output->winner,'result_id'=>$output->result_id,'userResults'=>$userResults);
                                 return response()->json($response);
                            }
                            $discard=$output->discard;
                            $dpArray=$output->dpArray;
                            $userResults=$output->results;
                         // dd($output);

                            if($rank==99){
                             $condition=array('type'=>'B');
                             $p1=$output->p1;
                             $p2=$output->p2;
                              // $results=Question::with('personality')->whereNotIn('id',$request->attempted)->where($condition)->orderBy('rank','asc')->first();
                               $results=$this->gettypebquestion($p1,$p2,$request->attempted);
                                if(!empty($results)){
                                 $results=QuestionTranslations::get_translation($results->id,$request->lang_id,$results);
                                }
                               // dd($results);
                              $barvalue=$this->progressbar($request->attempted,$discard,$settings,$dpArray);
                                $response=array('response'=>$results,'discard'=>$discard,'dpArray'=>$dpArray,'status'=>1,'rank'=>$rank,'stage'=>3,'p1'=>$p1,'p2'=>$p2,'userResults'=>$userResults,'typeBcount'=>1,'barvalue'=>$barvalue);
                            }
                            else{
                                 $results=Question::whereNotIn('personality_id',$discard)->whereNotIn('id',$request->attempted)->whereNotIn('personality_id',$discard)->where('rank',$rank)->where($condition)->orderBy('rank','asc')->first();
                                 if(!empty($results)){
                                  $results=QuestionTranslations::get_translation($results->id,$request->lang_id,$results);
                                }
                                 $barvalue=$this->progressbar($request->attempted,$discard,$settings,$dpArray);
                                  $response=array('response'=>$results,'discard'=>$discard,'dpArray'=>$dpArray,'status'=>1,'rank'=>$rank,'stage'=>2,
                                    'userResults'=>$userResults,'barvalue'=>$barvalue);
                            }
                          } //empty end
                    else{
                              $barvalue=$this->progressbar($request->attempted,$discard,$settings,$dpArray);
                          $response=array
                          ('response'=>$results,'discard'=>$discard,'dpArray'=>$dpArray,'status'=>$status,'rank'=>$request->rank,'stage'=>2,'userResults'=>$userResults,'barvalue'=>$barvalue);

                    }
                    return response()->json($response);
                    }
                      else if($request->rank==99 || $request->type == 'B'){
                          $condition=array('type'=>'B');
                            $results=$this->gettypebquestion($p1,$p2,$request->attempted);
                            if(!empty($results)){
                              $results=QuestionTranslations::get_translation($results->id,$request->lang_id,$results);
                            }
                            $typeBcount=$request->typeBcount;

                           if(!empty($results)){
                            $typeBcount=$request->typeBcount+1;
                           }
                            if($typeBcount > $settings->stage3_questions){
                              $results=array();
                            }
                          // dd($request->attempted);
                            if(empty( $results)){
                            $output=  $this->method1($request->userresponses,$request->rank,3,$discard,$dpArray);
                              if($output->status==4){
                                 $response=array('status'=>4,'winner'=>$output->winner,'result_id'=>$output->result_id,'userResults'=>$userResults);
                                   return response()->json($response);
                            }
                            $dpArray=$output->dpArray;
                              $barvalue=$this->progressbar($request->attempted,$discard,$settings,$dpArray);
                            $response=array('response'=>$results,'status'=>0,'rank'=>99,'stage'=>4,'userResults'=>$userResults,'barvalue'=>$barvalue);
                            }
                            else{
                              $barvalue=$this->progressbar($request->attempted,$discard,$settings,$dpArray);
                            $response=array('response'=>$results,'discard'=>$discard,'status'=>1,'rank'=>99,'stage'=>3,'p1'=>$p1,'p2'=>$p2,'userResults'=>$userResults,'typeBcount'=>$typeBcount,'barvalue'=>$barvalue);
                            }
                            return response()->json($response);
                      }
    			else{
				    return response()->json('NA');
    			}
    }
    public function getfirstquestion($lang_id){
        $results=Question::with('personality')->where('rank',1)->where('type','A')->first();
        $results=QuestionTranslations::get_translation($results->id,$lang_id,$results);
        $translations=LanguageTranslations::where('lang_id',$lang_id)->first();
        $response=array('response'=>$results,'translations'=>$translations);
         return response()->json($response);
    }
 public function gettypebquestion($p1,$p2,$attempted){
       $results=Question::with('personality')
          ->where(function($query) use ($p1,$p2,$attempted)
          {
              $query->whereNotIn('id',$attempted)->where('statement_a_pid',$p1)->where('statement_b_pid',$p2);
          })->orwhere(function($query) use ($p1,$p2,$attempted)
          {
              $query->whereNotIn('id',$attempted)->where('statement_b_pid',$p1)->where('statement_a_pid',$p2);
          })->orderBy('rank')->first();
         return $results;
    }

    public function get_result($id){
      $data=Result::where('result_no',$id)->first();
       $data->mean2=json_decode($data->mean);
    //    dd($data->mean2->r1);
       $data->r2_data=Personality::where('id',$data->mean2->r2)->first();
       $data->r3_data=Personality::where('id',$data->mean2->r3)->first();
       $data->r4_data=Personality::where('id',$data->mean2->r4)->first();
       $data->r5_data=Personality::where('id',$data->mean2->r5)->first();
       $data->r6_data=Personality::where('id',$data->mean2->r6)->first();
       $data->r7_data=Personality::where('id',$data->mean2->r7)->first();
       $data->r8_data=Personality::where('id',$data->mean2->r8)->first();
       $data->r9_data=Personality::where('id',$data->mean2->r9)->first();

       $data->Personality=Personality::where('id',$data->winner_id)->first();
    //    dd($data);
      $response=array('response'=>$data);
      return json_encode($response);
    }
   
}
