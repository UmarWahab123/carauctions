<?php
namespace App\Models\Test;
use Illuminate\Database\Eloquent\Model;
use DB;
class QuestionTranslations extends Model
{
    protected $guarded = array();
    protected $primaryKey  = 'trans_id';
    protected $table = 'question_translations';

    public static function  get_data_translation($id){
       $data= DB::table('questions')
       ->join('question_translations','questions.id','=','question_translations.question_id')
       ->join('languages','languages.langid','=','question_translations.lang_id')
                ->where('questions.id',$id)->get();
            foreach($data as $key=>$value){
                $lang[]=$value->lang_id;
            }
            $newlang = DB::table('languages')->whereNotIn('langid', $lang)->get();
			$data = $data->merge($newlang);
            return $data;
            dd($data);


    }
    public static function  get_type_questions($type){
       $data= DB::table('questions')
       ->join('question_translations','questions.id','=','question_translations.question_id')
       ->join('languages','languages.langid','=','question_translations.lang_id')
                ->where('questions.type',$type)
                ->get();
            return $data;
            //dd($data);
    }
    public static function get_questions($id,$trans_id){
        if($trans_id > 0){
            $data= DB::table('questions')
            ->join('question_translations','questions.id','=','question_translations.question_id')
            ->join('languages','languages.langid','=','question_translations.lang_id')
                ->where('questions.id',$id)
                ->where('question_translations.trans_id',$trans_id)
                ->first();
        }else{
            $data= DB::table('questions')
            ->join('question_translations','questions.id','=','question_translations.question_id')
            ->join('languages','languages.langid','=','question_translations.lang_id')
                ->where('questions.id',$id)
                ->get();
        }
            return $data;
    }
    public static function get_translation($id,$lang_id,$results){
        $trans= DB::table('question_translations')
        ->where('question_id',$id)->where('lang_id',$lang_id)->first();
        if(empty($trans)){
            $trans= DB::table('question_translations')
        ->where('question_id',$id)->where('lang_id',1)->first();
        }
        $results->question=$trans->question;
        $results->statement_a_text=$trans->statement_a_text;
        $results->statement_b_text=$trans->statement_b_text;
        return $results;

    }
}
